<?php

namespace App\Livewire\Pages\Pembayaran;

use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Mine extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.pembayaran.mine', [
            'datas' => Pembayaran::whereHas('undangan', function($und){
                $und->where('user_id',Auth::id());
            })->get()
        ]);
    }
}
