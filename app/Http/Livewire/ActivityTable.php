<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Activity;
use App\Models\User;
use App\Models\Contact;
use App\Models\ActivityType;
use Illuminate\Validation\Rule;

class ActivityTable extends Component
{
     
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'activity_date';
    public $sortAsc = false;
    public $searchActivities ='';
    public $status = true;
    public $contact_id = null;
    public $contact = null;
    public $user_id = 'All';
    public $activity_type_id = 'All';
    public $isActivityOpen = false;
    public $activity_date = null;
    public $subject = null;
    public $details = null;
    public $account_id = null;
    public $activity_id = null;




    public function updatingSearch()
    {
        $this->resetPage();
    }
    /**
     * [sortBy description]
     * 
     * @param [type] $field [description]
     * 
     * @return [type]        [description]
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
    /**
     * [mount description]
     * 
     * @param [type] $contact [description]
     * 
     * @return [type]          [description]
     */
    public function mount($contact=null, $account=null)
    {
        $this->contact_id = $contact;
        if ($contact) {
            $this->contact = Contact::findOrFail($contact);
            $this->account_id = $this->contact->account_id;
        } else {
            $this->account_id = $account;
        }
        

    }
    /**
     * [render description]
     * 
     * @return [type] [description]
     */
    public function render()
    {
        
        return view(
            'livewire.activity-table', [
                'activities'=>Activity::with('contact', 'account', 'owner')
                    
                    ->search($this->searchActivities)
                    ->with(
                        'contact', function ($q) {
                            $q->withLastActivityId()->with('lastActivity');
                        }
                    )
                    ->when(
                        $this->activity_type_id != 'All', function ($q) {
                            $q->where('activity_type_id', $this->activity_type_id);
                        }
                    )
                    ->when(
                        $this->contact_id, function ($q) {
                            $q->where('contact_id', $this->contact_id);
                        }
                    )
                    ->when(
                        $this->account_id, function ($q) {
                            $q->where('account_id', $this->account_id);
                        }
                    )
                    ->when(
                        $this->user_id != 'All', function ($q) {
                            $q->where('owner_id', $this->user_id);
                        }
                    )
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage),
                    'contacts' =>Contact::where('account_id', $this->account_id)
                        ->select('id', 'firstName', 'lastName')
                        ->get(),
                    
                    'users' => User::pluck('name', 'id')->toArray(),
                    'types' => ActivityType::orderBy('activity')->pluck('activity', 'id')->toArray(),
                ]
        );
    }
    /**
     * [create description]
     * 
     * @return [type] [description]
     */
    public function createActivity()
    {

         $this->_resetInputFields();

         $this->openActivityModal();

    }
    /**
     * [_resetInputFields description]
     * 
     * @return [type] [description]
     */
    private function _resetInputFields()
    {
        $this->activity_date = null;
        $this->status = null;
        $this->subject = null;
        $this->details = null;
        $this->contact_id = null;


    }
    /**
     * [openActivityModal description]
     * 
     * @return [type] [description]
     */
    public function openActivityModal()
    {

        $this->isActivityOpen = true;

    }
    /**
     * [closeModal description]
     * 
     * @return [type] [description]
     */
    public function closeActivityModal()
    {

        $this->isActivityOpen = false;

    }
    
    public function storeActivity()
    {

        $this->validate(
            [
             'activity_date' => 'required|date',
             'subject' => 'required', 
             'activity_type_id' => ['required',
                          Rule::notIn(['All'])],
            ]
        );

        Activity::updateOrCreate(
            ['id' => $this->activity_id], 
            [
                'activity_date' => $this->activity_date,
                'activity_type_id' => $this->activity_type_id,
                'status' => $this->status,
                'subject'=> $this->subject,
                'details' => $this->details,
                'owner_id' => auth()->user()->id,
                'account_id' => $this->account_id,
                'contact_id' => $this->contact_id

            ]
        );

     

        session()->flash(
            'message',
            $this->account_id ? 'Account Updated Successfully.' : 'Account Created Successfully.'
        );
        $this->activity_type_id = 'All';
        $this->closeActivityModal();
        $this->_resetInputFields();

    }
}
