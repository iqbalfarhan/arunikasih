<?php

namespace App\Livewire\Pages\Notif;

use App\Livewire\Forms\NotifForm;
use App\Models\Notif;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Notif $notif;
    public NotifForm $form;

    #[On("createNotif")]
    public function createNotif()
    {
        $this->show = true;
    }

    #[On("editNotif")]
    public function editNotif(Notif $notif)
    {
        $this->show = true;
        $this->form->setNotif($notif);
    }

    #[On("deleteNotif")]
    public function deleteNotif(Notif $notif)
    {
        $notif->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data notif berhasil dihapus');
    }

    #[On("readNotif")]
    public function readNotif(Notif $notif)
    {
        $notif->read = !$notif->read;
        $notif->save();
        $this->dispatch('reload');
        $this->alert('success', 'Notifikasi ditandai sudah dibaca');
    }

    public function simpan(){
        if (isset($this->form->notif)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data notif berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.notif.actions', [
            'users' => User::pluck('name', 'id')
        ]);
    }
}
