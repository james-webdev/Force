<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\withPagination;
use App\Models\AccountType;

class AccounttypesTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $sortField = 'type';
    public $sortAsc = true;
    public $search ='';
    public $type = '';
    public $isOpen = false;
    public $account_type_id = null;
    public $confirming = null;
    /**
     * [updatingSearch description]
     *
     * @return [type] [description]
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }
    /**
     * Set SortField
     *
     * @param string $field [description]
     *
     * @return sortField        [description]
     */
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
    }


    public function render()
    {
        return view(
            'livewire.accounttypes-table',
            ['accounttypes'=>AccountType::withCount('accounts')
                ->search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
            ]
        );
    }

/**
     * [create description]
     *
     * @return [type] [description]
     */
    public function create()
    {

         $this->_resetInputFields();

         $this->openModal();

    }


    public function edit($account_type_id)
    {
        $accounttype = AccountType::findOrFail($account_type_id);
        $this->account_type_id = $account_type_id;
        $this->type = $accounttype->type;
        $this->openModal();

    }
    /**
     * [_resetInputFields description]
     *
     * @return [type] [description]
     */
    public function _resetInputFields()
    {
        $this->type = '';

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
        $this->account_type_id = null;

    }

    public function store()
    {

        $this->validate(
            [
             'type' => 'required',
            ]
        );

        AccountType::updateOrCreate(
            ['id' => $this->account_type_id],
            [
                'type' => $this->type,
            ]
        );

        session()->flash(
            'message',
            $this->account_type_id ? 'Account Type Updated Successfully' :  'Account Type Created Successfully.'
        );


        $this->closeModal();
        $this->_resetInputFields();

    }

    public function confirmDelete($account_type_id)
    {
        $this->confirming = $account_type_id;
    }


    public function delete($account_type_id)
    {
        $accounttype = AccountType::findOrFail($account_type_id);

            $accounttype->delete();
            session()->flash('message', 'Account Type Deleted Successfully.');


    }

    public function stopDelete($account_type_id)
    {
        $this->confirming = null;
    }

}
