<?php

namespace App\Livewire\Pages\Pembayaran;

use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.pembayaran.index', [
            'datas' => Auth::user()->hasRole('user') ? Pembayaran::where('user_id', Auth::id())->get() : Pembayaran::get()
        ]);
    }
}
