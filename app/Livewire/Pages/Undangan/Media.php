<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Gallery;
use App\Models\Undangan;
use Livewire\Component;

class Media extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = $undangan;
    }

    public function render()
    {
        return view('livewire.pages.undangan.media', [
            'datas' => Gallery::where('undangan_id', $this->undangan->id)->get()
        ])->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}
