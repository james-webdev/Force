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
    public $status = '0';
    public $account_id = null;
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
    public function mount($account_id = null)
    {
        $this->account_id = $account_id;
    }
    public function render()
    {
        
        return view(
            'livewire.opportunities-table', [
                'opportunities' => Opportunity::with('owner', 'account')
                    ->search($this->search)
                    ->with(
                        'contact', function ($q) {
                            $q->withLastActivityId()->with('lastActivity');
                        }
                    )
                    ->when(
                        $this->user_id != 'All', function ($q) {
                            $q->where('owner_id', $this->user_id);
                        }
                    )
                    ->when(
                        $this->account_id, function ($q) {
                            $q->where('account_id', $this->account_id);
                        }
                    )
                    ->when(
                        $this->status != 'All', function ($q) {
                            $q->where('status', $this->status);
                        }
                    ) 
                    

                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage),
                    'statuses'=>[0=>'Open', 1=>'Closed Won', 2=> 'Closed Lost'],
                    
                    'users' => User::pluck('name', 'sf_id')->toArray(),
                ]
        );
    }
}
