<?php

namespace App\Livewire\Forms;

use App\Models\Gallery;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GalleryForm extends Form
{
    public ?Gallery $gallery;
    public $undangan_id;
    public $filename;

    public function setGallery(Gallery $gallery){
        $this->gallery = $gallery;

        $this->undangan_id = $gallery->undangan_id;
        $this->filename = $gallery->filename;
    }

    public function store(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'filename' => 'required',
        ]);

        Gallery::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'filename' => 'required',
        ]);

        $this->gallery->update($valid);

        $this->reset();
    }

}
