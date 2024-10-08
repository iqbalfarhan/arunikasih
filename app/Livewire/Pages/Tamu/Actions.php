<?php

namespace App\Livewire\Pages\Tamu;

use App\Livewire\Forms\TamuForm;
use App\Models\Tamu;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Tamu $tamu;
    public TamuForm $form;

    #[On("createTamu")]
    public function createTamu()
    {
        $this->show = true;
    }

    #[On("editTamu")]
    public function editTamu(Tamu $tamu)
    {
        $this->show = true;
        $this->form->setTamu($tamu);
    }

    #[On("deleteTamu")]
    public function deleteTamu(Tamu $tamu)
    {
        $tamu->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data tamu berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Tamu $tamu)
    {
        $tamu->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data tamu berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan(){
        if (isset($this->form->tamu)) {
            $this->form->update();
        }
        else{
            $this->form->store();
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
        return view('livewire.pages.tamu.actions');
    }
}