<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.pages.about', [
            'content' => file_get_contents(base_path('README.md')),
        ]);
    }
}
