<?php

namespace App\Livewire\Pages\Rating;

use App\Models\Rating;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.rating.index', [
            'datas' => Rating::get()
        ]);
    }
}
