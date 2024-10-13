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
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
        ]);

        if ($this->ring) {
            $valid['ring'] = $this->ring;
        }
        if ($this->topleft) {
            $valid['topleft'] = $this->topleft;
        }
        if ($this->topright) {
            $valid['topright'] = $this->topright;
        }
        if ($this->bottomleft) {
            $valid['bottomleft'] = $this->bottomleft;
        }
        if ($this->bottomright) {
            $valid['bottomright'] = $this->bottomright;
        }

        Ornament::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
        ]);

        if ($this->ring) {
            $valid['ring'] = $this->ring;
        }
        if ($this->topleft) {
            $valid['topleft'] = $this->topleft;
        }
        if ($this->topright) {
            $valid['topright'] = $this->topright;
        }
        if ($this->bottomleft) {
            $valid['bottomleft'] = $this->bottomleft;
        }
        if ($this->bottomright) {
            $valid['bottomright'] = $this->bottomright;
        }

        $this->ornament->update($valid);

        $this->reset();
    }

}
