<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Account;
use App\Models\User;
use App\Models\Industry;


class AccountsTable extends Component
{

    
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'name';
    public $sortAsc = true;
    public $search ='';
    public $status = 'All';
    public $user_id = 'All';
    public $industry_id = 'All';
    public $isOpen = 0;
    public $name;
    public $street;
    public $city;
    public $state;
    public $postalcode;
    public $description;
    public $account_id;


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
            'livewire.accounts-table', [
                'accounts'=>Account::withLastActivityId()
                    ->withCount('contacts', 'openOpportunities', 'wonOpportunities', 'opportunities')
                    ->with('owner', 'lastActivity', 'industry')
                    ->totalBusiness()
                    ->search($this->search)
                    ->when(
                        $this->user_id != 'All', function ($q) {
                            $q->where('owner_id', $this->user_id);
                        }
                    )
                    ->when(
                        $this->industry_id != 'All', function ($q) {
                            $q->where('industry_id', $this->industry_id);
                        }
                    )
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage),
                    'industries' => Industry::orderBy('industry')->pluck('industry', 'id')->toArray(),
                    'users' => User::pluck('name', 'sf_id')->toArray(),
                ]
        );
    }

    public function create()
    {

         $this->_resetInputFields();

         $this->openModal();

    }
    /**
     * [_resetInputFields description]
     * 
     * @return [type] [description]
     */
    private function _resetInputFields()
    {
        $this->name = '';
        $this->street = '';
        $this->city = '';
        $this->state = '';
        $this->postalcode = '';
        $this->description = '';

    }
    /**
     * [openModal description]
     * 
     * @return [type] [description]
     */
    public function openModal()
    {

        $this->isOpen = true;

    }
    /**
     * [closeModal description]
     * 
     * @return [type] [description]
     */
    public function closeModal()
    {

        $this->isOpen = false;

    }

    public function store()
    {

        $this->validate(
            [
             'name' => 'required',
            ]
        );

        Account::updateOrCreate(
            ['id' => $this->account_id], 
            [
                'name' => $this->name,
                'street' => $this->street,
                'city'=> $this->city,
                'state' => $this->state, 
                'postalcode' => $this->postalcode,
                'description' => $this->description,
                'owner_id' => auth()->user()->id

            ]
        );

     

        session()->flash(
            'message',
            $this->account_id ? 'Account Updated Successfully.' : 'Account Created Successfully.'
        );
     
        $this->closeModal();
        $this->resetInputFields();

    }
}

