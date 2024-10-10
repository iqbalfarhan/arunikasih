<?php

namespace App\Livewire\Forms;

use App\Models\Rating;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RatingForm extends Form
{
    public ?Rating $rating;

    public $user_id;
    public $insight;
    public $rate = "0";

    public function setRating(Rating $rating){
        $this->rating = $rating;

        $this->user_id = $rating->user_id;
        $this->insight = $rating->insight;
        $this->rate = $rating->rate;
    }

    public function store(){
        $valid = $this->validate([
            'user_id' => 'required',
            'insight' => 'required',
            'rate' => 'required',
        ]);

        Rating::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'user_id' => 'required',
            'insight' => 'required',
            'rate' => 'required',
        ]);

        $this->rating->update($valid);

        $this->reset();
    }

}
