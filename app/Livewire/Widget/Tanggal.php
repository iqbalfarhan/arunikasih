<?php

namespace App\Livewire\Widget;

use Livewire\Component;

class Tanggal extends Component
{
    public function render()
    {
        return view('livewire.widget.tanggal', [
            'tanggal' => date('d F Y'),
            'waktu' => date('H:i:s'),
        ]);
    }
}
