<?php

namespace App\Livewire\Forms;

use App\Models\Kategori;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class KategoriForm extends Form
{
    public ?Kategori $kategori;

    public $name;

    public function setKategori(Kategori $kategori){
        $this->kategori = $kategori;

        $this->name = $kategori->name;
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required'
        ]);

        Kategori::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required'
        ]);

        $this->kategori->update($valid);

        $this->reset();
    }

}
