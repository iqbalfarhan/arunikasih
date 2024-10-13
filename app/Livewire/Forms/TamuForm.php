<?php

namespace App\Livewire\Forms;

use App\Models\Tamu;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TamuForm extends Form
{
    public ?Tamu $tamu;

    public $name;
    public $undangan_id;
    public $present;
    public $message;
    public $reply;

    public function setTamu(Tamu $tamu){
        $this->tamu = $tamu;

        $this->name = $tamu->name;
        $this->undangan_id = $tamu->undangan_id;
        $this->present = $tamu->present;
        $this->message = $tamu->message;
        $this->reply = $tamu->reply;
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
            'undangan_id' => 'required',
            'present' => 'required',
            'message' => 'required',
            'reply' => '',
        ]);

        Tamu::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
            'undangan_id' => 'required',
            'present' => 'required',
            'message' => 'required',
            'reply' => '',
        ]);

        $this->tamu->update($valid);

        $this->reset();
    }

}
