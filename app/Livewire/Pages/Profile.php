<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
     use WithFileUploads, LivewireAlert;

    public $photo;
    public $name;
    public $email;
    public $password;
    public User $user;

    public function mount(){
        $user = User::find(auth()->id());

        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function simpan(){
        $valid = $this->validate([
            'user' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($this->password) {
            $this->validate([
                'password' => 'required',
            ]);
            $valid['password'] = Hash::make($this->password);
        }

        if ($this->photo) {
            $this->validate([
                'photo' => 'image',
            ]);
            $this->photo->store('user');
            $valid['photo'] = $this->photo->hashName('user');
        }

        // dd($valid);

        $this->user->update($valid);

        $this->alert('success', 'Data berhasil disimpan');
    }

    public function render()
    {
        return view('livewire.pages.profile');
    }
}
