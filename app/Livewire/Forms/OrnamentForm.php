<?php

namespace App\Livewire\Forms;

use App\Models\Ornament;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OrnamentForm extends Form
{
    public ?Ornament $ornament;

    public $name;
    public $ring;
    public $topleft;
    public $topright;
    public $bottomleft;
    public $bottomright;

    public function setOrnament(Ornament $ornament){
        $this->ornament = $ornament;

        $this->name = $ornament->name;
        $this->ring = $ornament->ring;
        $this->topleft = $ornament->topleft;
        $this->topright = $ornament->topright;
        $this->bottomleft = $ornament->bottomleft;
        $this->bottomright = $ornament->bottomright;
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
            'ring' => '',
            'topleft' => '',
            'topright' => '',
            'bottomleft' => '',
            'bottomright' => '',
        ]);

        Ornament::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
            'ring' => '',
            'topleft' => '',
            'topright' => '',
            'bottomleft' => '',
            'bottomright' => '',
        ]);

        $this->ornament->update($valid);

        $this->reset();
    }

}
