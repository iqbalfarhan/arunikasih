<?php

namespace App\Livewire\Pages\Tamu;

use App\Models\Tamu;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Share extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Tamu $tamu;

    #[On("shareTamu")]
    public function shareTamu(Tamu $tamu)
    {
        $this->show = true;
        $this->tamu = $tamu;
    }

    public function resetForm(){
        $this->show = false;
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.tamu.share');
    }
}
