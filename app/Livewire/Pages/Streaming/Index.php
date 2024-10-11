<?php

namespace App\Livewire\Pages\Streaming;

use App\Models\Streaming;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.streaming.index', [
            'datas' => Streaming::get()
        ]);
    }
}
