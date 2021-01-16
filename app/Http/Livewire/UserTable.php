<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;


class UserTable extends Component
{


    use WithPagination;
    public $perPage = 10;
    public $sortField = 'name';
    public $sortAsc = true;
    public $name = null;
    public $email = null;
    public $isOpen = false;
    public $user_id = null;
    public $search ='';



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

        $this->sortField = $field;
    }



    public function render()
    {
        return view(
            'livewire.user-table',
            [
                'users'=>User::withCount('accounts')
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
    /**
     * [_resetInputFields description]
     *
     * @return [type] [description]
     */
    public function _resetInputFields()
    {
        $this->name = '';
        $this->email = '';

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

        User::updateOrCreate(
            ['id' => $this->user_id],
            [
                'name' => $this->name,
                'email' => $this->email,
            ]
        );

        session()->flash(
            'message',
            $this->user_id ? 'User Updated Successfully.' : 'User Created Successfully.'
        );

        $this->closeModal();
        $this->_resetInputFields();

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->user_id = $user_id; 
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($user_id)
    {
        $user= User::withCount('accounts')->find($user_id);
        if ($user->accounts_count ==0) {
            $user->delete();
            session()->flash('message', 'User Deleted Successfully.');
        } else {
            session()->flash('message', 'User has accounts.  Move these before deleing user.');
        }
        
    }

}
