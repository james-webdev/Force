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


    public function render()
    {
        return view('livewire.sales-stage-table', 
            'stages'=>SalesStage::search($this->search)
             ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage),
    }
}
