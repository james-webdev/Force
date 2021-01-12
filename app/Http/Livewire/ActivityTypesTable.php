<?php

namespace App\Http\Livewire;
use App\Models\ActivityType;
use Livewire\Component;
use Livewire\WithPagination;

class ActivityTypesTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $sortField = 'type';
    public $sortAsc = true;
    public $search ='';
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
    }
    public function render()
    {
        return view(
            'livewire.activity-types-table',
            [
                $activitytypes = ActivityType::withCount('activities')
                    ->search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage),
            ]
        );
    }
}
