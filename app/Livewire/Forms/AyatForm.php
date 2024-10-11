<?php

namespace App\Livewire\Forms;

use App\Models\Ayat;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AyatForm extends Form
{
    public ?Ayat $ayat;
    public $surah;
    public $content;
    public $kategori_id;

    public function setAyat(Ayat $ayat){
        $this->ayat = $ayat;

        $this->surah = $ayat->surah;
        $this->content = $ayat->content;
        $this->kategori_id = $ayat->kategori_id;
    }

    public function store(){
        $valid = $this->validate([
            'surah' => 'required',
            'content' => 'required',
        ]);

        Ayat::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'surah' => 'required',
            'content' => 'required',
        ]);

        $this->ayat->update($valid);

        $this->reset();
    }

}
