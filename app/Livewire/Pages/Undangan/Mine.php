<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Undangan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Mine extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.undangan.mine', [
            'datas' => Undangan::where('user_id', Auth::id())->get()
        ]);
    }
}
