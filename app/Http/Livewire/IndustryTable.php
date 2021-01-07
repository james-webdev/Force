<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\withPagination;
use App\Models\Industry;

class IndustryTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $sortField = 'industry';

    public $sortAsc = true;
    public $search ='';
public function updatingSearch()
    {
        $this->resetPage();
    }
    /**
     * Set SortField
     * 
     * @param string $field [description]
     * 
     * @return sortField        [description]
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
    public function render()
    {

        return view(
            'livewire.industry-table', 
            ['industries'=>Industry::withCount('accounts')
                ->search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
            ]
        );
    }
}
