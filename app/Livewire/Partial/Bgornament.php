<?php

namespace App\Livewire\Partial;

use App\Models\Ornament;
use Livewire\Component;

class Bgornament extends Component
{
    public Ornament $ornament;
    public $light = false;

    public function mount($ornament_id)
    {
        $this->ornament = Ornament::find($ornament_id);
    }

    public function render()
    {
        return view('livewire.partial.bgornament');
    }
}
