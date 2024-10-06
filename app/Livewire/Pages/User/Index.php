<?php

namespace App\Livewire\Pages\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.user.index', [
            'user' => auth()->user(),
            'datas' => User::when($this->cari, function($user){
                $user->where('name', 'like', "%{$this->cari}%")
                ->orWhere('email', 'like', "%{$this->cari}%");
            })->orderBy('active', 'desc')->get()
        ]);
    }
}
