<?php

namespace App\Livewire\Pages\Event;

use App\Livewire\Forms\EventForm;
use App\Models\Event;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Event $event;
    public EventForm $form;

    #[On("createEvent")]
    public function createEvent($undangan)
    {
        $this->form->undangan_id = $undangan;
        $this->show = true;
    }

    #[On("editEvent")]
    public function editEvent(Event $event)
    {
        $this->show = true;
        $this->form->setEvent($event);
    }

    #[On("deleteEvent")]
    public function deleteEvent(Event $event)
    {
        $event->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data event berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Event $event)
    {
        $event->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data event berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan(){
        if (isset($this->form->event)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data event berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.event.actions');
    }
}
