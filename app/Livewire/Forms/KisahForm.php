<?php

namespace App\Livewire\Forms;

use App\Models\Kisah;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class KisahForm extends Form
{
    public ?Kisah $kisah;

    public $title;
    public $content;
    public $undangan_id;

    public function setKisah(Kisah $kisah){
        $this->kisah = $kisah;

        $this->undangan_id = $kisah->undangan_id;
        $this->title = $kisah->title;
        $this->content = $kisah->content;
    }

    public function store(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        Kisah::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $this->kisah->update($valid);

        $this->reset();
    }

}
