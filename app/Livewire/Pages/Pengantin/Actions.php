<?php

namespace App\Livewire\Pages\Pengantin;

use App\Livewire\Forms\PengantinForm;
use App\Models\Pengantin;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Pengantin $pengantin;
    public PengantinForm $form;

    #[On("createPengantin")]
    public function createPengantin($undangan_id)
    {
        $this->form->undangan_id = $undangan_id;
        $this->show = true;
    }

    #[On("editPengantin")]
    public function editPengantin(Pengantin $pengantin)
    {
        $this->show = true;
        $this->form->setPengantin($pengantin);
    }

    #[On("deletePengantin")]
    public function deletePengantin(Pengantin $pengantin)
    {
        $pengantin->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data pengantin berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Pengantin $pengantin)
    {
        $pengantin->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data pengantin berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan(){
        if (isset($this->form->pengantin)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data pengantin berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.pengantin.actions');
    }
}