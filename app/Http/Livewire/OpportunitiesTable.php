<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Opportunity;
use App\Models\User;
use App\Models\SalesStage;
class OpportunitiesTable extends Component
{
    
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = true;
    public $search ='';
    public $status = 'All';
    public $stage_id = 'All';
    public $user_id = 'All';




    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }
    public function render()
    {
        
        return view(
            'livewire.opportunities-table', [
                'opportunities' => Opportunity::with('owner', 'account', 'stage')
                    ->search($this->search)
                    ->with(
                        'contact', function ($q) {
                            $q->withLastActivityId()->with('lastActivity');
                        }
                    )
                    ->when(
                        $this->user_id != 'All', function ($q) {
                            $q->where('user_id', $this->user_id);
                        }
                    )
                    ->when(
                        $this->status != 'All', function ($q) {
                            $q->where('status', $this->status);
                        }
                    ) 
                    ->when(
                        $this->stage_id != 'All', function ($q) {
                            $q->where('stage_id', $this->stage_id);
                        }
                    )

                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage),
                    'statuses'=>[0=>'Open', 1=>'Closed Won', 2=> 'Closed Lost'],
                    'stages' => SalesStage::pluck('stage', 'id')->toArray(),
                    'users' => User::pluck('name', 'id')->toArray(),
                ]
        );
    }
}
