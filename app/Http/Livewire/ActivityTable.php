<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Activity;

class ActivityTable extends Component
{
     
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'name';
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
            'livewire.activity-table', [
                'activities'=>Activity::with('contact', 'account', 'owner')
                    
                    ->search($this->search)
                    ->with(
                        'contacts', function ($q) {
                            $q->withLastActivityId()->with('lastActivity');
                        }
                    )
                    ->when(
                        $this->user_id != 'All', function ($q) {
                            $q->where('owner_id', $this->user_id);
                        }
                    )
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage),
                    
                    'users' => User::pluck('name', 'sf_id')->toArray(),
                ]
        );
    }
}
