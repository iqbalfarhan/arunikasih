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
    public $before_discount;
    public $price;
    public $description;
    public $kategori_id;
    public $example;

    public function setPaket(Paket $paket){
        $this->paket = $paket;

        $this->name = $paket->name;
        $this->before_discount = $paket->before_discount;
        $this->price = $paket->price;
        $this->description = $paket->description;
        $this->kategori_id = $paket->kategori_id;
        $this->example = $paket->example;
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
            'before_discount' => 'required',
            'price' => 'required',
            'description' => 'required',
            'kategori_id' => 'required',
            'example' => '',
        ]);

        Paket::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
            'before_discount' => 'required',
            'price' => 'required',
            'description' => 'required',
            'kategori_id' => 'required',
            'example' => '',
        ]);

        $this->paket->update($valid);

        $this->reset();
    }

}
