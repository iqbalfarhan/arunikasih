<?php

namespace App\Livewire\Pages\Pembayaran;

use App\Models\Pembayaran;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.pembayaran.index', [
            'datas' => Pembayaran::get()
        ]);
    }
}
