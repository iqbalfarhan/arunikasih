<?php

namespace App\Livewire\Forms;

use App\Models\Undangan;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UndanganForm extends Form
{
    public ?Undangan $undangan;

    public function setUndangan(Undangan $undangan){
        $this->undangan = $undangan;

        //
    }

    public function store(){
        $valid = $this->validate([
            //
        ]);

        Undangan::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            //
        ]);

        $this->undangan->update($valid);

        $this->reset();
    }

}
