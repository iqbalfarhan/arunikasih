<?php

namespace App\Livewire\Pages\Music;

use App\Models\Music;
use Livewire\Attributes\On;
use Livewire\Component;

class Player extends Component
{
    public ?Music $music;

    #[On("playMusic")]
    public function playMusic(Music $music)
    {
        $this->music = $music;
    }

    public function resetMusic()
    {
        $this->music = null;
    }

    public function render()
    {
        return view('livewire.pages.music.player');
    }
}
