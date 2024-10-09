<?php

namespace App\Livewire\Forms;

use App\Models\Undangan;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UndanganForm extends Form
{
    public ?Undangan $undangan;

    public $name;
    public $slug;
    public $user_id;
    public $tema_id;
    public $kategori_id;
    public $paket_id;
    public $shared = false;
    public $paid = false;
    public $event_date;

    public function setUndangan(Undangan $undangan){
        $this->undangan = $undangan;

        $this->name = $undangan->name;
        $this->slug = $undangan->slug;
        $this->user_id = $undangan->user_id;
        $this->tema_id = $undangan->tema_id;
        $this->kategori_id = $undangan->kategori_id;
        $this->paket_id = $undangan->paket_id;
        $this->shared = $undangan->shared;
        $this->paid = $undangan->paid;
        $this->event_date = $undangan->event_date->format('Y-m-d');
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'user_id' => 'required',
            'tema_id' => 'required',
            'kategori_id' => 'required',
            'paket_id' => 'required',
            'shared' => 'required',
            'paid' => 'required',
            'event_date' => '',
        ]);

        Undangan::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'user_id' => 'required',
            'tema_id' => 'required',
            'kategori_id' => 'required',
            'paket_id' => 'required',
            'shared' => 'required',
            'paid' => 'required',
            'event_date' => '',
        ]);

        $this->undangan->update($valid);

        $this->reset();
    }

}
