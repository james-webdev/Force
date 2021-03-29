<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact;
use App\Models\User;
use App\Models\Account;

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
    public $name = null;
    public $account_id = null;
    public $contact_id = null;
    public $isOpen = false;
    public $firstName = null;
    public $lastName = null;
    public $email = null;
    public $title = null;
    public $phone = null;
    public $mobile = null;
    public $description = null;
    public $accounts;




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
    public function mount($account = null)
    {
        $this->account_id = $account;
        if ($this->account_id) {
             $this->accounts = Account::findOrFail($this->account_id)->pluck('name', 'id');
        } else {
             $this->accounts = Account::pluck('name', 'id');
        }
        $this->user_id = auth()->user()->id;
        
    }
    public function render()
    {

        return view(
            'livewire.contacts.contact-table', [
                'contacts'=>Contact::
                    join('accounts', 'contacts.account_id', '=', 'accounts.id')
                    ->search($this->search)
                    ->withLastActivityId()

                    ->with('lastActivity')
                    ->when(
                        $this->user_id != 'All', function ($q) {
                            $q->where('contacts.user_id', $this->user_id);
                        }
                    )
                    ->when(
                        $this->name, function ($q) {
                            $q->where('accounts.name', $this->name);
                        }
                    )
                    ->when(
                        $this->account_id, function ($q) {
                            $q->where('accounts.id', $this->account_id);
                        }
                    )
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage),

                    'users' => User::has('contacts')->pluck('name', 'id')->toArray(),
                    
                ]
        );
    }

    /**
     * [create description]
     *
     * @return [type] [description]
     */
    public function createContact()
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
        $this->firstName = null;
        $this->lastName = null;
        $this->email = null;
        $this->phone = null;
        $this->mobile = null;
        $this->description = null;


    }
    /**
     * [openActivityModal description]
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

    public function storeContact()
    {

        $this->validate(
            [
             'firstName' => 'required',
             'lastName' => 'required',
             'email' => 'required|email',
             'account_id'=>'required',
            ]
        );

        Contact::updateOrCreate(
            ['id' => $this->contact_id],
            [
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'title'=> $this->title,
                'email' => $this->email,
                'phone'=> $this->phone,
                'mobile' => $this->mobile,
                'description'=>$this->description,

                'user_id' => auth()->user()->id,
                'account_id' => $this->account_id,
            ]
        );



        session()->flash(
            'message',
            $this->contact_id ? 'Contact Updated Successfully.' : 'Contact Created Successfully.'
        );
        //$this->activity_type_id = 'All';
        $this->closeModal();
        $this->_resetInputFields();

    }
}
