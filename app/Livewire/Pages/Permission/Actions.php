<?php

namespace App\Livewire\Pages\Permission;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Actions extends Component
{
    use LivewireAlert;

    public $show = false;
    public $mode = "permission";
    public $name;

    public ?Permission $permission;
    public ?Role $role;

    #[On('createPermission')]
    public function createPermission(){
        $this->show = true;
        $this->mode = "permission";
    }

    #[On('editPermission')]
    public function editPermission(Permission $permission){
        $this->permission = $permission;
        $this->show = true;
        $this->mode = "permission";
        $this->name = $permission->name;
    }

    #[On('deletePermission')]
    public function deletePermission(Permission $permission){
        $permission->delete();
        $this->alert('success', 'Permission berhsil dihapus');
        $this->dispatch('reload');
    }

    #[On('editRole')]
    public function editRole(Role $role){
        $this->role = $role;
        $this->show = true;
        $this->mode = "role";
        $this->name = $role->name;
    }

    #[On('deleteRole')]
    public function deleteRole(Role $role){
        $role->delete();
        $this->alert('success', 'Role berhsil dihapus');
        $this->dispatch('reload');
    }

    #[On('setRole')]
    public function setRole(Permission $permission, $role){
        $permission->hasRole($role) ? $permission->removeRole($role) : $permission->assignRole($role);
        $this->alert('success', 'Berhsil mengubah status permission');
        $this->dispatch('reload');
    }

    public function closeActions(){
        $this->show = false;
        $this->reset([
            'name',
            'permission',
            'role'
        ]);
    }

    public function simpan()
    {
        $valid = $this->validate([
            'name' =>'required'
        ]);

        if ($this->mode == "permission") {
            if (isset($this->permission)) {
                $this->permission->update($valid);
            }
            else{
                Permission::create($valid);
            }
        }
        else{
            if (isset($this->role)) {
                $this->role->update($valid);
            }
            else{
                Role::create($valid);
            }
        }

        $this->closeActions();
        $this->alert("success","Berhasil menyimpan role atau permission");
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.permission.actions');
    }
}
