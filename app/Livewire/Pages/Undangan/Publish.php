<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Undangan;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Publish extends Component
{
    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = Undangan::find($undangan->id);
    }

    public function render()
    {
        return view('livewire.pages.undangan.publish')->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}
