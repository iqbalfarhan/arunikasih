<?php

namespace App\Livewire\Pages\Ayat;

use App\Models\Ayat;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.ayat.index', [
            'datas' => Ayat::get()
        ]);
    }
}
