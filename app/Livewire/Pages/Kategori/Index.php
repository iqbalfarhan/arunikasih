<?php

namespace App\Livewire\Pages\Kategori;

use App\Models\Kategori;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.kategori.index', [
            'datas' => Kategori::get()
        ]);
    }
}
