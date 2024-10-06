<?php

namespace App\Livewire\Forms;

use App\Models\Fitur;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FiturForm extends Form
{
    public ?Fitur $fitur;
    public $name;
    public $description;
    public $kategori_id;

    public function setFitur(Fitur $fitur){
        $this->fitur = $fitur;

        $this->name = $fitur->name;
        $this->description = $fitur->description;
        $this->kategori_id = $fitur->kategori_id;
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'kategori_id' => 'required',
        ]);

        Fitur::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'kategori_id' => 'required',
        ]);

        $this->fitur->update($valid);

        $this->reset();
    }

}
