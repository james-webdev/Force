<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AccounttypesTable extends Component
{
    public $perPage = 10;
    public $sortField = 'type';
    public $sortAsc = true;
    public $search ='';

    public function render()
    {
        return view(
            'livewire.accounttypes-table',
            ['accounttypes'=>
                Accounttypes::withCount('accounts')
                    ->search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage),
            ]
        );
    }
}
