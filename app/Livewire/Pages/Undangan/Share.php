<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Tamu;
use App\Models\Undangan;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Share extends Component
{
    public Undangan $undangan;
    protected $listeners = ['reload' => '$refresh'];

    public function mount(Undangan $undangan)
    {
        $this->undangan = Undangan::find($undangan->id);
    }

    public function togglePublish()
    {
        $this->undangan->shared = $this->undangan->shared ? false : true;
        $this->undangan->save();

        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.undangan.share', [
            'tamus' => Tamu::where('undangan_id', $this->undangan->id)->get()
        ])->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}
