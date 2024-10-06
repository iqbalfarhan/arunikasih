<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Tema;
use App\Models\Undangan;
use Livewire\Component;

class Setting extends Component
{
    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = $undangan;
    }

    public function updateTema($temaId)
    {
        $this->undangan->tema_id = $temaId;
        $this->undangan->save();
    }

    public function render()
    {
        return view('livewire.pages.undangan.setting', [
            'temas' => Tema::get()
        ])->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}
