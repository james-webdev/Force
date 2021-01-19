<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SalesStage;

class SalesStageTable extends Component
{
    public $perPage;
    public $sortField = 'stage';
    public $sortAsc = true;
    public $search = '';
    public $isOpen = false;
    public $seq = null;
    public $stage = '';
    public $sales_stage_id = null;
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
     * [render description]
     * @return [type] [description]
     */
    public function render()
    {
        return view(
            'livewire.sales-stage-table',
            ['stages'=>SalesStage::search($this->search)
                    ->withCount('opportunities')
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

    public function edit($sales_stage_id)
    {
        $stage = SalesStage::findOrFail($sales_stage_id);
        $this->sales_stage_id = $sales_stage_id;
        $this->stage = $stage->stage;
        $this->openModal();

    }


    /**
     * [_resetInputFields description]
     *
     * @return [type] [description]
     */
    public function _resetInputFields()
    {
        $this->stage = '';

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
        $this->sales_stage_id = null;

    }

    public function store()
    {

        $this->validate(
            [
             'stage' => 'required',
            ]
        );

        SalesStage::updateOrCreate(
            ['id' => $this->sales_stage_id],
            [
                'stage' => $this->stage,
            ]
        );

        session()->flash(
            'message',
            $this->sales_stage_id ? 'Sales Stage Updated Successfully' :  'Sales Stage Created Successfully.'
        );

        $this->closeModal();
        $this->_resetInputFields();

    }

    public function confirmDelete($sales_stage_id)
    {
        $this->confirming = $sales_stage_id;
    }


    public function delete($sales_stage_id)
    {
        $salesstage = SalesStage::findOrFail($sales_stage_id);

            $salesstage->delete();
            session()->flash('message', 'Sales Stage Deleted Successfully.');


    }

    public function stopDelete($sales_stage_id)
    {
        $this->confirming = null;
    }

}
