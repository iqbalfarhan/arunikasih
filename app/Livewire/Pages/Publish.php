<?php

namespace App\Livewire\Pages;

use App\Models\Undangan;
use Livewire\Component;

class Publish extends Component
{
    public $cover = true;
    public ?Undangan $undangan;

    public function mount($katname, $slug)
    {
        $this->undangan = Undangan::where('slug', $slug)
        ->where('shared', true)
        ->whereHas('kategori', function($kat) use ($katname) {
            $kat->where('name', $katname);
        })->firstOrFail();
    }

    public function toggleCover()
    {
        $this->cover = !$this->cover;
    }

    public function render()
    {
        return view('livewire.pages.undangan.preview')->layout('components.layouts.publish', [
            'undangan' => $this->undangan,
        ]);
    }
}
