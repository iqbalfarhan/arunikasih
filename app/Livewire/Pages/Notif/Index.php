<?php

namespace App\Livewire\Pages\Notif;

use App\Models\Notif;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.notif.index', [
            'datas' => Notif::where('user_id', Auth::id())->latest()->get()
        ]);
    }
}
