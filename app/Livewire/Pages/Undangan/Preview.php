<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Undangan;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Preview extends Component
{
    public $cover = true;

    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = $undangan;
    }

    public function toggleCover()
    {
        $this->cover = !$this->cover;
    }

    public function render()
    {
        return view('livewire.pages.undangan.preview')->layout('components.layouts.publish', [
            'undangan' => $this->undangan,
        ]);
    }
}
