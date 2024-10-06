<?php

namespace App\Livewire\Partial;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Sidebar extends Component
{
    use LivewireAlert;

    #[On('logout')]
    public function logout()
    {
        Auth::logout();
        $this->flash('success', "Berhasil logout");
        $this->redirect(route('login'), navigate: true);
    }

    public function render()
    {
        return view('livewire.partial.sidebar');
    }
}
