<?php

namespace App\Livewire\Forms;

use App\Models\Hadiah;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class HadiahForm extends Form
{
    public ?Hadiah $hadiah;

    public $undangan_id;
    public $type;
    public $bank_id;
    public $pic;
    public $value;

    public function setHadiah(Hadiah $hadiah){
        $this->hadiah = $hadiah;

        $this->undangan_id = $hadiah->undangan_id;
        $this->type = $hadiah->type;
        $this->bank_id = $hadiah->bank_id;
        $this->pic = $hadiah->pic;
        $this->value = $hadiah->value;
    }

    public function store(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'type' => 'required',
            'bank_id' => 'required',
            'pic' => 'required',
            'value' => 'required',
        ]);

        Hadiah::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'type' => 'required',
            'bank_id' => 'required',
            'pic' => 'required',
            'value' => 'required',
        ]);

        $this->hadiah->update($valid);

        $this->reset();
    }

}
