<?php

namespace App\Livewire\Pages\Tamu;

use App\Livewire\Forms\TamuForm;
use App\Models\Tamu;
use App\Models\Undangan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Balas extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Tamu $tamu;
    public TamuForm $form;

    #[On("editBalasUcapan")]
    public function editBalasUcapan(Tamu $tamu)
    {
        $this->show = true;
        $this->form->setTamu($tamu);
    }

    #[On("balasUcapan")]
    public function balasUcapan(Tamu $tamu)
    {
        $this->show = true;
        $this->form->setTamu($tamu);
    }

    public function simpan(){
        if (isset($this->form->tamu)) {
            $this->form->update();
        }

        $this->resetForm();
        $this->alert('success', 'Data tamu berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.tamu.balas');
    }
}
