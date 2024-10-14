<?php

namespace App\Livewire;

use App\Models\Fitur;
use App\Models\Kategori;
use App\Models\Ornament;
use App\Models\Paket;
use App\Models\Rating;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Welcome extends Component
{
    public $kategori_id;
    #[Layout('components.layouts.landing')]

    public function setKategoriId($kategori_id)
    {
        $this->kategori_id = $kategori_id;
    }

    public function mount()
    {
        $this->kategori_id = Kategori::first()->id;
    }

    public function render()
    {
        return view('livewire.welcome', [
            'ratings' => Rating::latest()->limit(6)->get(),
            'kategoris' => Kategori::pluck('name', 'id'),
            'ornament' => Ornament::first(),
            'fiturs' => Fitur::where('kategori_id', $this->kategori_id)->get(),
            'pakets' => Paket::where('kategori_id', $this->kategori_id)->orderBy('price')->get(),
            'carousels' => [
                url('ornament/helloween.png'),
                url('ornament/floral.png'),
                url('ornament/winter.png'),
            ]
        ]);
    }
}
