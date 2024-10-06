<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Undangan;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.undangan.index', [
            'datas' => Undangan::get()
        ]);
    }
}
