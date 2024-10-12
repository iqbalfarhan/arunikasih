<?php

namespace App\Livewire\Forms;

use App\Models\Sosmed;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SosmedForm extends Form
{
    public ?Sosmed $sosmed;

    public $name;
    public $photo;

    public function setSosmed(Sosmed $sosmed){
        $this->sosmed = $sosmed;

        $this->name = $sosmed->name;
        $this->photo = $sosmed->photo;
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
            'photo' => '',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        Sosmed::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
            'photo' => '',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        $this->sosmed->update($valid);

        $this->reset();
    }

}
