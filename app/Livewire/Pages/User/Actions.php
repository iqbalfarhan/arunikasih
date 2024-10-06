<?php

namespace App\Livewire\Pages\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?User $user;
    public UserForm $form;

    #[On("createUser")]
    public function createUser()
    {
        $this->show = true;
    }

    #[On("editUser")]
    public function editUser(User $user)
    {
        $this->show = true;
        $this->form->setUser($user);
    }

    #[On("deleteUser")]
    public function deleteUser(User $user)
    {
        $user->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data user berhasil dihapus');
    }

    #[On("toggleActive")]
    public function toggleActive(User $user)
    {
        $user->active = !$user->active;
        $user->save();
        $this->alert('success', 'Data user berhasil aktifkan atau dinonaktifkan');
        $this->dispatch('reload');
    }

    #[On("deleteAccount")]
    public function deleteAccount(User $user)
    {
        $user->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data user berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    #[On("resetPasswordUser")]
    public function resetPasswordUser(User $user)
    {
        $user->update([
            'password' => Hash::make('password')
        ]);

        $this->resetForm();
        $this->alert('success', 'Password user berhasil direset');
    }

    public function simpan(){
        if (isset($this->form->user)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data user berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        $roles = auth()->user()->hasRole('superadmin') ? Role::pluck('name') : Role::whereNot('name', 'superadmin')->pluck('name');
        return view('livewire.pages.user.actions', [
            'roles' => $roles
        ]);
    }
}
