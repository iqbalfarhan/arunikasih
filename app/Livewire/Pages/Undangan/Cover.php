<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Undangan;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Cover extends Component
{
    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = $undangan;
    }

    public function render()
    {
        return view('livewire.pages.undangan.cover')->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}