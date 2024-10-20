<?php

namespace App\Livewire\Pages\Paket;

use App\Models\Kategori;
use App\Models\Paket;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function mount()
    {
        $this->cari = Kategori::first()->id;
    }

    public function render()
    {
        return view('livewire.pages.paket.index', [
            'datas' => Paket::when($this->cari, function($q){
                return $q->where('kategori_id', '=', $this->cari);
            })->orderBy('kategori_id')->get(),
            'kategoris' => Kategori::pluck('name', 'id')
        ]);
    }
}
