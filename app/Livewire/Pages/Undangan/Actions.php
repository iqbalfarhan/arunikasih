<?php

namespace App\Livewire\Pages\Undangan;

use App\Livewire\Forms\UndanganForm;
use App\Models\Kategori;
use App\Models\Undangan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use LivewireAlert, WithFileUploads;
    public $show = false;
    public $photo;
    public ?Undangan $undangan;
    public UndanganForm $form;

    #[On("createUndangan")]
    public function createUndangan()
    {
        $this->show = true;
    }

    #[On("editUndangan")]
    public function editUndangan(Undangan $undangan)
    {
        $this->show = true;
        $this->form->setUndangan($undangan);
    }

    #[On("deleteUndangan")]
    public function deleteUndangan(Undangan $undangan)
    {
        $undangan->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data undangan berhasil dihapus');
    }

    public function simpan()
    {
        if (isset($this->form->undangan)) {
            if ($this->photo) {
                $this->form->photo = $this->photo->store($this->form->undangan->id);
            }
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data undangan berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.undangan.actions', [
            'kategoris' => Kategori::pluck('name', 'id')
        ]);
    }
}
