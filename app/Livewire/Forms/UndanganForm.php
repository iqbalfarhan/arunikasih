<?php

namespace App\Livewire\Forms;

use App\Models\Pembayaran;
use App\Models\Undangan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
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
    public $ayat_id;
    public $music_id;
    public $ornament_id;
    public $shared = false;
    public $paid = false;
    public $event_date;
    public $photo;

    public function setUndangan(Undangan $undangan){
        $this->undangan = $undangan;

        $this->name = $undangan->name;
        $this->slug = $undangan->slug;
        $this->user_id = $undangan->user_id;
        $this->tema_id = $undangan->tema_id;
        $this->kategori_id = $undangan->kategori_id;
        $this->paket_id = $undangan->paket_id;
        $this->ayat_id = $undangan->ayat_id;
        $this->music_id = $undangan->music_id;
        $this->ornament_id = $undangan->ornament_id;
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
            'ayat_id' => 'required',
            'music_id' => '',
            'ornament_id' => '',
            'shared' => 'required',
            'paid' => 'required',
            'event_date' => '',
        ]);

        $valid['slug'] = Str::slug($this->name);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        $undangan = Undangan::create($valid);

        Pembayaran::factory()->create([
            'undangan_id' => $undangan->id,
        ]);

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
            'ayat_id' => 'required',
            'music_id' => '',
            'ornament_id' => '',
            'shared' => 'required',
            'paid' => 'required',
            'event_date' => '',
        ]);

        $valid['slug'] = Str::slug($this->name);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        $this->undangan->update($valid);

        $this->reset();
    }

}
