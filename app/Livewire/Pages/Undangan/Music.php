<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Undangan;
use Livewire\Component;

class Music extends Component
{
    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = $undangan;
    }

    public function render()
    {
        return view('livewire.pages.undangan.music')->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}
