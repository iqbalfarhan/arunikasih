<?php

namespace App\Livewire\Forms;

use App\Models\Notif;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class NotifForm extends Form
{
    public ?Notif $notif;

    public $user_id;
    public $message;
    public $read;

    public function setNotif(Notif $notif){
        $this->notif = $notif;

        $this->user_id = $notif->user_id;
        $this->message = $notif->message;
        $this->read = $notif->read;
    }

    public function store(){
        $valid = $this->validate([
            'user_id' => 'required',
            'message' => 'required',
            'read' => 'required',
        ]);

        Notif::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'user_id' => 'required',
            'message' => 'required',
            'read' => 'required',
        ]);

        $this->notif->update($valid);

        $this->reset();
    }

}
