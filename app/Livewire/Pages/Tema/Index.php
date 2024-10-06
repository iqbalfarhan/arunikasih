<?php

namespace App\Livewire\Pages\Tema;

use App\Models\Tema;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.tema.index', [
            'datas' => Tema::get()
        ]);
    }
}
