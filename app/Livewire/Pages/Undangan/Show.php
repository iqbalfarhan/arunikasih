<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Paket;
use App\Models\Undangan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
use LivewireAlert;
    public $partials = [];
    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = Undangan::find($undangan->id);
        $this->partials = $undangan->partials;
    }

    public function changeBagan()
    {
        $this->undangan->partials = $this->partials;
        $this->undangan->save();
        $this->alert('success', 'Data bagan undangan diperbarui');
    }

    public function resetBagan()
    {
        $newBagan = [];
        foreach(Paket::find($this->undangan->paket_id)->fiturs()->pluck('name') as $fitur){
            $newBagan[$fitur] = true;
        }
        $this->undangan->partials = $newBagan;

        $this->undangan->save();
        $this->dispatch('reload');
        $this->alert('success', 'Data bagan undangan diperbarui');
        $this->redirect(route('undangan.show', $this->undangan->id), true);
    }

    public function render()
    {
        return view('livewire.pages.undangan.show')->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}
