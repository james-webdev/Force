<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Opportunity;
use App\Models\User;
use App\Models\SalesStage;
use App\Models\Contact;
use App\Models\Account;

class OpportunitiesTable extends Component
{
    
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'name';
    public $sortAsc = true;
    public $search ='';
    public $status = '0';
    public $name = null;
    public $contact_id = null;
    public $user_id = 'All';
    public $account_id=null;
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
    /**
     * [mount description]
     * 
     * @param  [type] $account_id [description]
     * @return [type]             [description]
     */
    public function mount($account_id = null, $stage_id = null)
    {
        $this->account_id = $account_id;
        $this->stage_id = $stage_id;
    }
    public function render()
    {
        
        return view(
            'livewire.opportunities-table', [
                'opportunities' => Opportunity::
                    join('accounts', 'opportunities.account_id', '=', 'accounts.id')
                    ->with('owner')
                    ->search($this->search)
                    ->with(
                        'contact', function ($q) {
                            $q->withLastActivityId()->with('lastActivity');
                        }
                    )
                    ->when(
                        $this->user_id != 'All', function ($q) {
                            $q->where('user_id', $this->user_id);
                        }
                    )
                    ->when(
                        $this->name, function ($q) {
                            $q->where('name', $this->name);
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
                        $this->stage_id != 'All', function ($q) {
                            $q->where('stage_id', $this->stage_id);
                        }
                    )
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage),
                    'statuses'=>[0=>'Open', 1=>'Closed Won', 2=> 'Closed Lost'],
                    'contacts'=>Contact::select('id', 'firstName', 'lastName')
                        ->where('account_id', $this->account_id)
                        ->get(),
                    'accounts'=>Account::orderBy('name')->pluck('name', 'id')->toArray(),
                    'stages'=>SalesStage::all()->pluck('stage', 'id')->toArray(),
                    'users' => User::pluck('name', 'id')->toArray(),
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
