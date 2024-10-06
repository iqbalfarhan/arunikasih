<?php

namespace App\Livewire\Pages\Music;

use App\Livewire\Forms\MusicForm;
use App\Models\Music;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use LivewireAlert, WithFileUploads;
    public $show = false;
    public $filename;
    public ?Music $music;
    public MusicForm $form;

    #[On("createMusic")]
    public function createMusic()
    {
        $this->show = true;
    }

    #[On("editMusic")]
    public function editMusic(Music $music)
    {
        $this->show = true;
        $this->form->setMusic($music);
    }

    #[On("deleteMusic")]
    public function deleteMusic(Music $music)
    {
        $music->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data music berhasil dihapus');
    }

    public function simpan(){
        if ($this->filename) {
            $this->form->filename = $this->filename->store('music');
        }

        if (isset($this->form->music)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data music berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.music.actions');
    }
}
