<?php

namespace App\Livewire\Pages\Kisah;

use App\Livewire\Forms\KisahForm;
use App\Models\Kisah;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Kisah $kisah;
    public KisahForm $form;

    #[On("createKisah")]
    public function createKisah($undangan_id)
    {
        $this->form->undangan_id = $undangan_id;
        $this->show = true;
    }

    #[On("editKisah")]
    public function editKisah(Kisah $kisah)
    {
        $this->show = true;
        $this->form->setKisah($kisah);
    }

    #[On("deleteKisah")]
    public function deleteKisah(Kisah $kisah)
    {
        $kisah->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data kisah berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Kisah $kisah)
    {
        $kisah->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data kisah berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan(){
        if (isset($this->form->kisah)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data kisah berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.kisah.actions');
    }
}
