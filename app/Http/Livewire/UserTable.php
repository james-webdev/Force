<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\withPagination;


class UserTable extends Component
{


    use WithPagination;
    public $perPage = 10;


    public function render()
    {
        return view('livewire.user-table',
         ['users'=>User::withCount('accounts')
        ->paginate($this->perPage),
    ]);
    }
}
