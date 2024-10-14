<?php

namespace App\Livewire\Pages\Hadiah;

use App\Livewire\Forms\HadiahForm;
use App\Models\Hadiah;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Hadiah $hadiah;
    public HadiahForm $form;

    #[On("createHadiah")]
    public function createHadiah($undangan_id)
    {
        $this->form->undangan_id = $undangan_id;
        $this->show = true;
    }

    #[On("editHadiah")]
    public function editHadiah(Hadiah $hadiah)
    {
        $this->show = true;
        $this->form->setHadiah($hadiah);
    }

    #[On("deleteHadiah")]
    public function deleteHadiah(Hadiah $hadiah)
    {
        $hadiah->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data hadiah berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Hadiah $hadiah)
    {
        $hadiah->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data hadiah berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan(){
        if (isset($this->form->hadiah)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data hadiah berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.hadiah.actions');
    }
}
