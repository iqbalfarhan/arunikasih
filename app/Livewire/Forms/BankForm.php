<?php

namespace App\Livewire\Forms;

use App\Models\Bank;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BankForm extends Form
{
    public ?Bank $bank;

    public $name;
    public $filename;

    public function setBank(Bank $bank){
        $this->bank = $bank;

        $this->name = $bank->name;
        $this->filename = $bank->filename;
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
            'filename' => '',
        ]);

        Bank::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
            'filename' => '',
        ]);

        $this->bank->update($valid);

        $this->reset();
    }

}
