<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact;
use App\Models\User;

class ContactTable extends Component
{
     
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'lastname';
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
            'livewire.contact-table', [
                'contacts'=>Contact::search($this->search)
                    ->withLastActivityId()
                    ->has('company')
                    ->with('lastActivity', 'company', 'owner')
                    ->when(
                        $this->user_id != 'All', function ($q) {
                            $q->where('owner_id', $this->user_id);
                        }
                    )
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage),
                    
                    'users' => User::has('contacts')->pluck('name', 'id')->toArray(),
                ]
        );
    }
}
