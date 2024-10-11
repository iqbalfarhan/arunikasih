<?php

namespace App\Livewire\Pages\Sosmed;

use App\Models\Sosmed;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.sosmed.index', [
            'datas' => Sosmed::get()
        ]);
    }
}
