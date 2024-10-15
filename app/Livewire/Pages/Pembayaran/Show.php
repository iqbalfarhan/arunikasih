<?php

namespace App\Livewire\Pages\Pembayaran;

use App\Models\Pembayaran;
use Livewire\Component;

class Show extends Component
{
    public Pembayaran $pembayaran;

    public function mount(Pembayaran $pembayaran)
    {
        $this->pembayaran = $pembayaran;
    }

    public function render()
    {
        return view('livewire.pages.pembayaran.show');
    }
}
