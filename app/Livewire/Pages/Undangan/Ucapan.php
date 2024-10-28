<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Tamu;
use App\Models\Undangan;
use Livewire\Component;

class Ucapan extends Component
{
    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = $undangan;
    }

    public function togglePublish()
    {
        $this->undangan->shared = $this->undangan->shared ? false : true;
        $this->undangan->save();

        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.undangan.ucapan', [
            'datas' => Tamu::where('undangan_id', $this->undangan->id)->where('message', "!=", "")->get()
        ])->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}
