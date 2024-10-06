<?php

namespace App\Livewire\Pages\Tema;

use App\Livewire\Forms\TemaForm;
use App\Models\Tema;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Tema $tema;
    public TemaForm $form;

    #[On("createTema")]
    public function createTema()
    {
        $this->show = true;
    }

    #[On("editTema")]
    public function editTema(Tema $tema)
    {
        $this->show = true;
        $this->form->setTema($tema);
    }

    #[On("deleteTema")]
    public function deleteTema(Tema $tema)
    {
        $tema->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data tema berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Tema $tema)
    {
        $tema->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data tema berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan(){
        if (isset($this->form->tema)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data tema berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.tema.actions');
    }
}
