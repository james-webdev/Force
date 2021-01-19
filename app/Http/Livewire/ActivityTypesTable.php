<?php

namespace App\Http\Livewire;
use App\Models\ActivityType;
use Livewire\Component;
use Livewire\WithPagination;

class ActivitytypesTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $sortField = 'activity';
    public $sortAsc = true;
    public $search = '';
    public $activity = '';
    public $isOpen = false;
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
            'livewire.activitytypes.activitytypes-table',
            [
                'activitytypes' => ActivityType::withCount('activities')
                    ->search($this->search)
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
        $this->activity = '';

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
             'activity' => 'required',
            ]
        );

        ActivityType::updateOrCreate(
            [],
            [
                'activity' => $this->activity,
            ]
        );

        session()->flash(
            'message',
            'Activity Type Created Successfully.'
        );

        $this->closeModal();
        $this->_resetInputFields();

    }



}
