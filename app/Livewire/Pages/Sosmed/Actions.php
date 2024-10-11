<?php

namespace App\Livewire\Pages\Sosmed;

use App\Livewire\Forms\SosmedForm;
use App\Models\Sosmed;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use LivewireAlert, WithFileUploads;
    public $show = false;
    public $photo;
    public ?Sosmed $sosmed;
    public SosmedForm $form;

    #[On("createSosmed")]
    public function createSosmed()
    {
        $this->show = true;
    }

    #[On("editSosmed")]
    public function editSosmed(Sosmed $sosmed)
    {
        $this->show = true;
        $this->form->setSosmed($sosmed);
    }

    #[On("deleteSosmed")]
    public function deleteSosmed(Sosmed $sosmed)
    {
        $sosmed->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data sosmed berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Sosmed $sosmed)
    {
        $sosmed->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data sosmed berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan()
    {
        if (isset($this->form->photo)) {
            $this->form->photo = $this->photo->store('sosmed');
        }
        if (isset($this->form->sosmed)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data sosmed berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.sosmed.actions');
    }
}
