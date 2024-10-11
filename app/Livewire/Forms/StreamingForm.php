<?php

namespace App\Livewire\Forms;

use App\Models\Streaming;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StreamingForm extends Form
{
    public ?Streaming $streaming;
    public $undangan_id;
    public $sosmed_id;
    public $url;

    public function setStreaming(Streaming $streaming){
        $this->streaming = $streaming;

        $this->undangan_id = $streaming->undangan_id;
        $this->sosmed_id = $streaming->sosmed_id;
        $this->url = $streaming->url;
    }

    public function store(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'sosmed_id' => 'required',
            'url' => 'required',
        ]);

        Streaming::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'sosmed_id' => 'required',
            'url' => 'required',
        ]);

        $this->streaming->update($valid);

        $this->reset();
    }

}
