<?php

namespace App\Livewire\Pages\Notif;

use App\Models\Notif;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    public bool $read = false;

    protected $listeners = ['reload' => '$refresh'];

    public function toggleRead(){
        $this->read = !$this->read;
    }

    public function render()
    {
        return view('livewire.pages.notif.index', [
            'datas' => Notif::where('read', $this->read)->where('user_id', Auth::id())->latest()->get()
        ]);
    }
}
