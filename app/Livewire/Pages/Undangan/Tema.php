<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Undangan;
use Livewire\Component;

class Tema extends Component
{
    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = $undangan;
    }

    public function render()
    {
        return view('livewire.pages.undangan.tema')->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}
