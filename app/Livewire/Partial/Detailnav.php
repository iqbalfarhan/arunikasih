<?php

namespace App\Livewire\Partial;

use App\Models\Undangan;
use Livewire\Component;

class Detailnav extends Component
{
    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = $undangan;
    }

    public function render()
    {
        return view('livewire.partial.detailnav');
    }
}
