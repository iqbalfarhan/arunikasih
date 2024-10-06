<?php

namespace App\Livewire\Pages\Bank;

use App\Models\Bank;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.bank.index', [
            'datas' => Bank::get()
        ]);
    }
}
