<?php

namespace App\Livewire\Pages\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        $permissions = Permission::when($this->cari, function($permission){
            $permission->where('name', 'like', "%{$this->cari}%");
        })->orderBy('name')->get();

        return view('livewire.pages.permission.index', [
            'user' => auth()->user(),
            'roles' => Role::whereNot('name', 'superadmin')->pluck('name', 'id'),
            'permissions' => $permissions,
        ]);
    }
}
