<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Kategori;
use App\Models\Paket;
use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.pages.undangan.create', [
            'kategoris' => Kategori::pluck('name', 'id'),
            'pakets' => Paket::pluck('name', 'id')
        ]);
    }
}
