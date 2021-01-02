<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Opportunity;
use App\Models\User;
use App\Models\SalesStage;
use App\Models\Contact;

class OpportunitiesTable extends Component
{
    
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = true;
    public $search ='';
    public $status = '0';
    public $stage = 'All';
    public $account_id = null;
    public $contact_id = null;
    public $user_id = 'All';
    public $isOpportunityOpen = false;
    public $opportunity_id = null;
    public $close_date = null;
    public $title = null;
    public $description = null;
    public $stage_id = 'All';
    public $value = null;




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
                    ->when(
                        $this->stage != 'All', function ($q) {
                            $q->where('stage_id', $this->stage);
                        }
                    )
                    

                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage),
                    'statuses'=>[0=>'Open', 1=>'Closed Won', 2=> 'Closed Lost'],
                    'contacts'=>Contact::select('id', 'firstName', 'lastName')
                        ->where('account_id', $this->account_id)
                        ->get(),
                    'stages'=>SalesStage::all()->pluck('stage', 'id')->toArray(),
                    'users' => User::pluck('name', 'sf_id')->toArray(),
                ]
        );
    }
     /**
     * [create description]
     * 
     * @return [type] [description]
     */
    public function createOpportunity()
    {

         $this->_resetInputFields();

         $this->openOpportunityModal();

    }
    /**
     * [_resetInputFields description]
     * 
     * @return [type] [description]
     */
    private function _resetInputFields()
    {
        $this->opportunity_id = null;
        $this->close_date = null;
        $this->title = null;
        $this->description = null;
        $this->stage_id = 'All';
        $this->value = null;


    }
    /**
     * [openActivityModal description]
     * 
     * @return [type] [description]
     */
    public function openOpportunityModal()
    {

        $this->isOpportunityOpen = true;

    }
    /**
     * [closeModal description]
     * 
     * @return [type] [description]
     */
    public function closeOpportunityModal()
    {

        $this->isOpportunityOpen = false;

    }
    
    public function storeOpportunity()
    {

        $this->validate(
            [
             'title' => 'required',
             'value' => 'required|numeric',
             'close_date' => 'required|date', 
             'stage_id' => 'required',
             
             
            ]
        );

        Opportunity::updateOrCreate(
            ['id' => $this->opportunity_id], 
            [
                'title' => $this->title,
                'value' => $this->value,
                'stage_id' => $this->stage_id,
                'description' => $this->description,
                'owner_id' => auth()->user()->id,
                'account_id' => $this->account_id,
                'contact_id' => $this->contact_id

            ]
        );

     

        session()->flash(
            'message',
            $this->opportunity_id ? 'Opportunity Updated Successfully.' : 'Opportunity Created Successfully.'
        );

        $this->closeOpportunityModal();
        $this->_resetInputFields();

    }
}
