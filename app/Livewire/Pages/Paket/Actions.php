<?php

namespace App\Livewire\Pages\Paket;

use App\Livewire\Forms\PaketForm;
use App\Models\Fitur;
use App\Models\Kategori;
use App\Models\Paket;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Paket $paket;
    public PaketForm $form;
    public $features = [];

    #[On("createPaket")]
    public function createPaket()
    {
        $this->show = true;
    }

    #[On("editPaket")]
    public function editPaket(Paket $paket)
    {
        $this->show = true;
        $this->form->setPaket($paket);
    }

    #[On("deletePaket")]
    public function deletePaket(Paket $paket)
    {
        $paket->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data paket berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Paket $paket)
    {
        $paket->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data paket berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan()
    {
        if (isset($this->form->paket)) {
            $paket = Paket::find($this->form->paket->id);
            $paket->fiturs()->detach();
            $paket->fiturs()->attach($this->features);
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data paket berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.paket.actions', [
            'kategoris' => Kategori::pluck('name', 'id'),
            'fiturs' => $this->form->kategori_id ? Fitur::where('kategori_id', $this->form->kategori_id)->pluck('name', 'id') : collect()
        ]);
    }
}
