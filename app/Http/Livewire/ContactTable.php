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
    public $account_id = null;
    public $contact_id = null;
    public $isContactOpen = false;
    public $firstName = null;
    public $lastName = null;
    public $email = null;
    public $title = null;
    public $phone = null;
    public $mobile = null;
    public $description = null;




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
                    ->when(
                        $this->account_id, function ($q) {
                            $q->where('account_id', $this->account_id);
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

         $this->openContactModal();

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
    public function openContactModal()
    {

        $this->isContactOpen = true;

    }
    /**
     * [closeModal description]
     * 
     * @return [type] [description]
     */
    public function closeContactModal()
    {

        $this->isContactOpen = false;

    }
    
    public function storeContact()
    {

        $this->validate(
            [
             'firstName' => 'required',
             'lastName' => 'required', 
             'email' => 'required|email',
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
                
                'owner_id' => auth()->user()->id,
                'account_id' => $this->account_id,
            ]
        );

     

        session()->flash(
            'message',
            $this->contact_id ? 'Contact Updated Successfully.' : 'Contact Created Successfully.'
        );
        //$this->activity_type_id = 'All';
        $this->closeContactModal();
        $this->_resetInputFields();

    }
}
