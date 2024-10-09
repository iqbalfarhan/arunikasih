<?php

namespace App\Livewire\Forms;

use App\Models\Event;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EventForm extends Form
{
    public ?Event $event;

    public $undangan_id;
    public $name;
    public $location_name;
    public $latitude;
    public $longitude;
    public $datetime;

    public function setEvent(Event $event){
        $this->event = $event;

        $this->undangan_id = $event->undangan_id;
        $this->name = $event->name;
        $this->location_name = $event->location_name;
        $this->latitude = $event->latitude;
        $this->longitude = $event->longitude;
        $this->datetime = $event->datetime->format('Y-m-d H:i');
    }

    public function store(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'name' => 'required',
            'location_name' => 'required',
            'latitude' => '',
            'longitude' => '',
            'datetime' => 'required',
        ]);

        Event::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'name' => 'required',
            'location_name' => 'required',
            'latitude' => '',
            'longitude' => '',
            'datetime' => 'required',
        ]);

        $this->event->update($valid);

        $this->reset();
    }

}
