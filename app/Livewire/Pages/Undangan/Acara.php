<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Event;
use App\Models\Undangan;
use Livewire\Component;

class Acara extends Component
{
    public $no = 1;
    public $cari;
    public Undangan $undangan;

    protected $listeners = ['reload' => '$refresh'];

    public function mount(Undangan $undangan)
    {
        $this->undangan = $undangan;
    }

    public function render()
    {
        return view('livewire.pages.undangan.acara', [
            'datas' => Event::where('undangan_id', $this->undangan->id)->get()
        ])->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}
