<?php

namespace App\Livewire\Pages\Fitur;

use App\Livewire\Forms\FiturForm;
use App\Models\Fitur;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Fitur $fitur;
    public FiturForm $form;

    #[On("createFitur")]
    public function createFitur()
    {
        $this->show = true;
    }

    #[On("editFitur")]
    public function editFitur(Fitur $fitur)
    {
        $this->show = true;
        $this->form->setFitur($fitur);
    }

    #[On("deleteFitur")]
    public function deleteFitur(Fitur $fitur)
    {
        $fitur->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data fitur berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Fitur $fitur)
    {
        $fitur->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data fitur berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan(){
        if (isset($this->form->fitur)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data fitur berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.fitur.actions');
    }
}
