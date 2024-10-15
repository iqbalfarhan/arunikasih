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
                url('images/desktop/d-green.png'),
                url('images/desktop/blue.png'),
                url('images/desktop/green.png'),
                url('images/desktop/gold.png'),
                url('images/desktop/pink.png'),
                url('images/desktop/yellow.png'),
            ],
            'carousel_mobile' => [
                url('images/phone/blue.png'),
                url('images/phone/green.png'),
                url('images/phone/gold.png'),
                url('images/phone/pink.png'),
                url('images/phone/yellow.png'),
            ]
        ]);
    }
}
