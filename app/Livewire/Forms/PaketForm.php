<?php

namespace App\Livewire\Forms;

use App\Models\Paket;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PaketForm extends Form
{
    public ?Paket $paket;

    public $name;
    public $price;
    public $description;
    public $kategori_id;

    public function setPaket(Paket $paket){
        $this->paket = $paket;

        $this->name = $paket->name;
        $this->price = $paket->price;
        $this->description = $paket->description;
        $this->kategori_id = $paket->kategori_id;
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'kategori_id' => 'required',
        ]);

        Paket::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'kategori_id' => 'required',
        ]);

        $this->paket->update($valid);

        $this->reset();
    }

}
