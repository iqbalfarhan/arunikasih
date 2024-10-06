<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Register extends Component
{
    use LivewireAlert;

    public $name;
    public $email;
    public $password;

    public function register()
    {
        $valid = $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create($valid);

        if ($user) {
            $user->assignRole('guest');

            Auth::login($user);
            $this->flash('success', "Berhasil login");
            $this->redirect(route('home'), navigate:true);
        }
        else{
            $this->alert('error', "Pendaftaran dibatalkan");
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
