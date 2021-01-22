<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Industry;

class IndustryTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $sortField = 'industry';
    public $sortAsc = true;
    public $search ='';
    public $isOpen = false;
    public $industry = '';
    public $industry_id = null;
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
            'livewire.industries.industry-table',
            ['industries'=>Industry::withCount('accounts')
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

    public function edit($industry_id)
    {
        $industry = Industry::findOrFail($industry_id);
        $this->industry_id = $industry_id;
        $this->industry = $industry->industry;
        $this->openModal();

    }

    /**
     * [_resetInputFields description]
     *
     * @return [type] [description]
     */
    public function _resetInputFields()
    {
        $this->industry = '';

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
             'industry' => 'required',
            ]
        );

        Industry::updateOrCreate(
            ['id' => $this->industry_id],
            [
                'industry' => $this->industry,
            ]
        );

        session()->flash(
            'message',
            $this->industry_id ? 'Industry Updated Successfully.' : 'Industry Created Successfully.'
        );

        $this->closeModal();
        $this->_resetInputFields();

    }

    public function confirmDelete($industry_id)
    {
        $this->confirming = $industry_id;
    }


    public function delete($industry_id)
    {
        $industry = Industry::findOrFail($industry_id);

            $industry->delete();
            session()->flash('message', 'Industry Deleted Successfully.');


    }

    public function stopDelete($industry_id)
    {
        $this->confirming = null;
    }

}
