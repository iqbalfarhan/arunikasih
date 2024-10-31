<?php

namespace App\Livewire\Pages\Undangan;

use App\Livewire\Forms\TamuForm;
use App\Models\Tamu;
use App\Models\Undangan;
use Livewire\Attributes\On;
use Livewire\Component;

class Chat extends Component
{
    public $show = false;

    public ?Undangan $undangan;
    public TamuForm $form;

    #[On('openChat')]
    public function openChat(Tamu $tamu)
    {
        $this->show = true;
        $this->form->setTamu($tamu);
        $this->undangan = Undangan::find($tamu->undangan_id);
    }

    #[On('closeModal')]
    public function closeModal()
    {
        $this->show = false;
        $this->form->reset();
    }

    public function toggePresent(){
        $this->form->present =!$this->form->present;
    }

    public function simpan()
    {
        $this->form->update();
        $this->dispatch('reload');
        $this->reset('show');
    }

    public function render()
    {
        return view('livewire.pages.undangan.chat');
    }
}
