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
    public $default_value;

    public function setFitur(Fitur $fitur){
        $this->fitur = $fitur;

        $this->name = $fitur->name;
        $this->description = $fitur->description;
        $this->kategori_id = $fitur->kategori_id;
        $this->default_value = json_encode($fitur->default_value);
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'kategori_id' => 'required',
            'default_value' => 'required',
        ]);

        Fitur::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'kategori_id' => 'required',
            'default_value' => 'required',
        ]);

        $this->fitur->update($valid);

        $this->reset();
    }

}
