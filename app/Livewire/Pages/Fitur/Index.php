<?php

namespace App\Livewire\Pages\Fitur;

use App\Models\Fitur;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.fitur.index', [
            'datas' => Fitur::get()
        ]);
    }
}
