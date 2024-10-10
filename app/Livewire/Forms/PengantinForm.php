<?php

namespace App\Livewire\Forms;

use App\Models\Pengantin;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PengantinForm extends Form
{
    public ?Pengantin $pengantin;

    public $undangan_id;
    public $gender;
    public $name;
    public $father;
    public $mother;
    public $child;
    public $photo;

    public function setPengantin(Pengantin $pengantin){
        $this->pengantin = $pengantin;

        $this->undangan_id = $pengantin->undangan_id;
        $this->gender = $pengantin->gender;
        $this->name = $pengantin->name;
        $this->father = $pengantin->father;
        $this->mother = $pengantin->mother;
        $this->child = $pengantin->child;
        $this->photo = $pengantin->photo;
    }

    public function store(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'gender' => 'required',
            'name' => 'required',
            'father' => 'required',
            'mother' => 'required',
            'child' => 'required',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        Pengantin::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'gender' => 'required',
            'name' => 'required',
            'father' => 'required',
            'mother' => 'required',
            'child' => 'required',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        $this->pengantin->update($valid);

        $this->reset();
    }

}
