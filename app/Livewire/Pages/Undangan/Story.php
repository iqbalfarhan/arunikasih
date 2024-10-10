<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Kisah;
use App\Models\Undangan;
use Livewire\Component;

class Story extends Component
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
        return view('livewire.pages.undangan.story', [
            'datas' => Kisah::where('undangan_id', $this->undangan->id)->get()
        ])->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}
