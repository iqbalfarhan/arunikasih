<?php

namespace App\Livewire\Forms;

use App\Models\Tema;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TemaForm extends Form
{
    public ?Tema $tema;
    public $name;
    public $kategori_id;
    public $thumbnail;
    public $css;

    public function setTema(Tema $tema){
        $this->tema = $tema;

        $this->name = $tema->name;
        $this->kategori_id = $tema->kategori_id;
        $this->thumbnail = $tema->thumbnail;
        $this->css = $tema->css;
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
            'kategori_id' => 'required',
            'thumbnail' => 'required',
            'css' => 'required',
        ]);

        Tema::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
            'kategori_id' => 'required',
            'thumbnail' => 'required',
            'css' => 'required',
        ]);

        $this->tema->update($valid);

        $this->reset();
    }

}
