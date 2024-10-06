<?php

namespace App\Livewire\Pages\Bank;

use App\Livewire\Forms\BankForm;
use App\Models\Bank;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Bank $bank;
    public BankForm $form;

    #[On("createBank")]
    public function createBank()
    {
        $this->show = true;
    }

    #[On("editBank")]
    public function editBank(Bank $bank)
    {
        $this->show = true;
        $this->form->setBank($bank);
    }

    #[On("deleteBank")]
    public function deleteBank(Bank $bank)
    {
        $bank->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data bank berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Bank $bank)
    {
        $bank->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data bank berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan(){
        if (isset($this->form->bank)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data bank berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.bank.actions');
    }
}
