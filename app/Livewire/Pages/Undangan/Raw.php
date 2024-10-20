<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Undangan;
use Livewire\Component;

class Raw extends Component
{
    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = Undangan::with([
            'user',
            'tema',
            'kategori',
            'paket',
            'ayat',
            'music',
            'ornament',
            'tamus',
            'pengantins',
            'events',
            'galleries',
            'kisahs',
            'streamings',
            'hadiahs',
            'pembayaran'
        ])->find($undangan->id);
    }

    public function render()
    {
        return view('livewire.pages.undangan.raw');
    }
}
