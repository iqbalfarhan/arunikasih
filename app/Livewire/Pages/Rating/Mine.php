<?php

namespace App\Livewire\Pages\Rating;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Mine extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.rating.mine', [
            'datas' => Rating::where('user_id', Auth::id())->get()
        ]);
    }
}
