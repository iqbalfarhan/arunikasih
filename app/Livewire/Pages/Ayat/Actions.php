<?php

namespace App\Livewire\Pages\Ayat;

use App\Livewire\Forms\AyatForm;
use App\Models\Ayat;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Ayat $ayat;
    public AyatForm $form;

    #[On("createAyat")]
    public function createAyat()
    {
        $this->show = true;
    }

    #[On("editAyat")]
    public function editAyat(Ayat $ayat)
    {
        $this->show = true;
        $this->form->setAyat($ayat);
    }

    #[On("deleteAyat")]
    public function deleteAyat(Ayat $ayat)
    {
        $ayat->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data ayat berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Ayat $ayat)
    {
        $ayat->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data ayat berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan(){
        if (isset($this->form->ayat)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data ayat berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.ayat.actions');
    }
}
