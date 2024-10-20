<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Undangan;
use Livewire\Component;

class Table extends Component
{
    public $no = 1;

    protected $listeners = [
        'reload' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.pages.undangan.table', [
            'datas' => Undangan::get()
        ]);
    }
}
