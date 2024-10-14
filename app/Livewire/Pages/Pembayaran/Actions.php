<?php

namespace App\Livewire\Pages\Pembayaran;

use App\Livewire\Forms\PembayaranForm;
use App\Models\Pembayaran;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Pembayaran $pembayaran;
    public PembayaranForm $form;

    #[On("createPembayaran")]
    public function createPembayaran()
    {
        $this->show = true;
    }

    #[On("editPembayaran")]
    public function editPembayaran(Pembayaran $pembayaran)
    {
        $this->show = true;
        $this->form->setPembayaran($pembayaran);
    }

    #[On("deletePembayaran")]
    public function deletePembayaran(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data pembayaran berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data pembayaran berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan(){
        if (isset($this->form->pembayaran)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data pembayaran berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.pembayaran.actions');
    }
}
