<?php

namespace App\Livewire\Forms;

use App\Models\Music;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MusicForm extends Form
{
    public ?Music $music;
    public $artist;
    public $title;
    public $filename;

    public function setMusic(Music $music){
        $this->music = $music;

        $this->artist = $music->artist;
        $this->title = $music->title;
        $this->filename = $music->filename;
    }

    public function store(){
        $valid = $this->validate([
            'artist' => 'required',
            'title' => 'required',
            'filename' => '',
        ]);

        Music::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'artist' => 'required',
            'title' => 'required',
            'filename' => '',
        ]);

        $this->music->update($valid);

        $this->reset();
    }

}
