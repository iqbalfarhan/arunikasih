<?php

namespace App\Livewire\Pages\Kategori;

use App\Livewire\Forms\KategoriForm;
use App\Models\Kategori;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Kategori $kategori;
    public KategoriForm $form;

    #[On("createKategori")]
    public function createKategori()
    {
        $this->show = true;
    }

    #[On("editKategori")]
    public function editKategori(Kategori $kategori)
    {
        $this->show = true;
        $this->form->setKategori($kategori);
    }

    #[On("deleteKategori")]
    public function deleteKategori(Kategori $kategori)
    {
        $kategori->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data kategori berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Kategori $kategori)
    {
        $kategori->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data kategori berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan(){
        if (isset($this->form->kategori)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data kategori berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.kategori.actions');
    }
}
