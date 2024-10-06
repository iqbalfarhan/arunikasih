<?php

namespace App\Livewire\Widget;

use Livewire\Component;

class Userinfo extends Component
{
    public function render()
    {
        return view('livewire.widget.userinfo', [
            'user' => auth()->user(),
        ]);
    }
}
