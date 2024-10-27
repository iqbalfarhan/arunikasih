<?php

namespace App\Livewire\Widget;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Undangan extends Component
{
    public function render()
    {
        return view('livewire.widget.undangan', [
            'count' => \App\Models\Undangan::where('user_id', Auth::id())->count(),
        ]);
    }
}
