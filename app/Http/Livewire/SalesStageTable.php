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
                         ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage),
            ]
        );
    }
}
