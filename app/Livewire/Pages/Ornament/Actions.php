<?php

namespace App\Livewire\Pages\Ornament;

use App\Livewire\Forms\OrnamentForm;
use App\Models\Ornament;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use LivewireAlert, WithFileUploads;
    public $show = false;
    public ?Ornament $ornament;
    public OrnamentForm $form;

    public $ringfile;
    public $topleftfile;
    public $toprightfile;
    public $bottomleftfile;
    public $bottomrightfile;

    #[On("createOrnament")]
    public function createOrnament()
    {
        $this->show = true;
    }

    #[On("editOrnament")]
    public function editOrnament(Ornament $ornament)
    {
        $this->show = true;
        $this->form->setOrnament($ornament);
    }

    #[On("deleteOrnament")]
    public function deleteOrnament(Ornament $ornament)
    {
        $ornament->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data ornament berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Ornament $ornament)
    {
        $ornament->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data ornament berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan()
    {
        if($this->ringfile){
            $this->form->ring = $this->ringfile->store('ornament');
        }
        if($this->topleftfile){
            $this->form->topleft = $this->topleftfile->store('ornament');
        }
        if($this->toprightfile){
            $this->form->topright = $this->toprightfile->store('ornament');
        }
        if($this->bottomleftfile){
            $this->form->bottomleft = $this->bottomleftfile->store('ornament');
        }
        if($this->bottomrightfile){
            $this->form->bottomright = $this->bottomrightfile->store('ornament');
        }

        if (isset($this->form->ornament)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->reset([
            'ringfile',
            'topleftfile',
            'toprightfile',
            'bottomleftfile',
            'bottomrightfile',
        ]);
        $this->alert('success', 'Data ornament berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.ornament.actions');
    }
}
