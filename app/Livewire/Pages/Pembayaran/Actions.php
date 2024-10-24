<?php

namespace App\Livewire\Pages\Pembayaran;

use App\Livewire\Forms\PembayaranForm;
use App\Models\Bank;
use App\Models\Pembayaran;
use App\Models\Undangan;
use App\Models\User;
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

    #[On("toggleConfirm")]
    public function toggleConfirm(Pembayaran $pembayaran)
    {
        if ($pembayaran->confirmed) {
            $pembayaran->confirmed = false;
            $pembayaran->confirmed_at = null;
        }
        else{
            $pembayaran->confirmed = true;
            $pembayaran->confirmed_at = now();
        }

        $pembayaran->save();

        $this->dispatch('reload');
        $this->alert('success', 'Data pembayaran berhasil diupdate');
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
        return view('livewire.pages.pembayaran.actions', [
            'users' => User::pluck('name', 'id'),
            'banks' => Bank::pluck('name'),
            'undangans' => Undangan::when($this->form->user_id, function($q){
                $q->where('user_id', $this->form->user_id);
            })->pluck('name', 'id'),
        ]);
    }
}
