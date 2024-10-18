<?php

namespace App\Livewire\Pages\Gallery;

use App\Livewire\Forms\GalleryForm;
use App\Models\Gallery;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use LivewireAlert, WithFileUploads;
    public $show = false;
    public $filename;
    public ?Gallery $gallery;
    public GalleryForm $form;

    #[On("createGallery")]
    public function createGallery($undangan_id)
    {
        $this->form->undangan_id = $undangan_id;
        $this->show = true;
    }

    #[On("editGallery")]
    public function editGallery(Gallery $gallery)
    {
        $this->show = true;
        $this->form->setGallery($gallery);
    }

    #[On("deleteGallery")]
    public function deleteGallery(Gallery $gallery)
    {
        $gallery->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data gallery berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Gallery $gallery)
    {
        $gallery->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data gallery berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan()
    {
        if ($this->filename) {
            $this->form->filename = $this->filename->store($this->form->undangan_id);
        }

        if (isset($this->form->gallery)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data gallery berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.gallery.actions');
    }
}
