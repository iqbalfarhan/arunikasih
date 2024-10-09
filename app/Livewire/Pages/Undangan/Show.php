<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Undangan;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = Undangan::with('tamus', 'user', 'tema', 'paket', 'kategori', 'pengantins')->find($undangan->id);
    }

    public function render()
    {
        return view('livewire.pages.undangan.show')->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}
