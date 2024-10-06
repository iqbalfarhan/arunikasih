<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;
    public $name;
    public $email;
    public $password;
    public $role;

    public function setUser(User $user){
        $this->user = $user;

        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->getRoleNames()->first();
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required|min:8',
        ]);

        $user = User::create($valid);
        $user->syncRoles($this->role);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        if ($this->password) {
            $this->validate([
                'password' => 'min:8'
            ]);

            $valid['password'] = Hash::make($this->password);
        }

        $this->user->update($valid);
        $this->user->syncRoles($this->role);

        $this->reset();
    }

}
