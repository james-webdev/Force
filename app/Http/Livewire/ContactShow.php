<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact;
use App\Models\Activity;
use App\Models\User;


class ContactShow extends Component
{

    
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'activity_date';
    public $sortAsc = true;
    public $search ='';
    public $isOpen = 0;
    public $name;
    public $street;
    public $city;
    public $state;
    public $postalcode;
    public $description;
    public $contact_id;


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
    public function mount($contact)
    {
        $this->contact_id = $contact;
    }
    public function render()
    {

        return view(
            'livewire.contacts.contacts-show', [
                'contact'=>Contact::with('company', 'owner')
                    ->search($this->search)
                    
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->findorFail($this->contact_id),
                    
                    'activities' => Activity::where('contact_id', $this->contact_id)->orWhere('company_id', $contact->company_id)->paginate($this->perPage)
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

        Activity::updateOrCreate(
            ['id' => $this->activity_id], 
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

