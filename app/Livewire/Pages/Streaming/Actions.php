<?php

namespace App\Livewire\Pages\Streaming;

use App\Livewire\Forms\StreamingForm;
use App\Models\Sosmed;
use App\Models\Streaming;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Streaming $streaming;
    public StreamingForm $form;

    #[On("createStreaming")]
    public function createStreaming($undangan_id)
    {
        $this->form->undangan_id = $undangan_id;
        $this->show = true;
    }

    #[On("editStreaming")]
    public function editStreaming(Streaming $streaming)
    {
        $this->show = true;
        $this->form->setStreaming($streaming);
    }

    #[On("deleteStreaming")]
    public function deleteStreaming(Streaming $streaming)
    {
        $streaming->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data streaming berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Streaming $streaming)
    {
        $streaming->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data streaming berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan(){
        if (isset($this->form->streaming)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data streaming berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.streaming.actions', [
            'sosmeds' => Sosmed::pluck('name', 'id')
        ]);
    }
}
