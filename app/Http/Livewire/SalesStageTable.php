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
            'livewire.salesstages.sales-stage-table', 
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
    /**
     * [_resetInputFields description]
     *
     * @return [type] [description]
     */
    public function _resetInputFields()
    {
        $this->stage = '';
        $this->seq = null;

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
             'stage' => 'required',
            ]
        );

        SalesStage::updateOrCreate(
            [],
            [
                'stage' => $this->stage,
                'seq' => $this->seq,
            ]
        );

        session()->flash(
            'message',
            'Sales Stage Created Successfully.'
        );

        $this->closeModal();
        $this->_resetInputFields();

    }
}
