<?php

namespace App\Http\Livewire;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;

class RolePermission extends Component
{
    
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'name';
    public $sortAsc = true;
    public $search ='';
   
    public $isOpen = 0;
    public $name;
    public $guard_name = 'api';
    public $role;
    public $permission;

    public function __construct()
    {
        $this->role = new Role;
        $this->permission = new Permission;
    }
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
    public function mount()
    {
       
    }
    public function render()
    {
        return view(
            'livewire.roles.role-permission',
            [
                'roles'=>$this->role->withCount('users')->paginate($this->perPage),


            ]
        );
    }
}
