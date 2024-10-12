<?php

namespace App\Livewire\Pages\Ornament;

use App\Models\Ornament;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.ornament.index', [
            'datas' => Ornament::get()
        ]);
    }
}
