<?php

namespace App\Livewire\Pages\Fitur;

use App\Models\Fitur;
use App\Models\Kategori;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.fitur.index', [
            'datas' => Fitur::when($this->cari, function($q){
                return $q->where('kategori_id', $this->cari);
            })->orderBy('kategori_id')->get(),
            'kategoris' => Kategori::pluck('name', 'id')
        ]);
    }
}
