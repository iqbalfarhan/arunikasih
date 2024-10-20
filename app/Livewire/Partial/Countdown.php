<?php

namespace App\Livewire\Partial;

use Carbon\Carbon;
use Livewire\Component;

class Countdown extends Component
{
    public $tanggal;

    protected $listeners = ['reload' => '$refresh'];

    public function mount(Carbon $tanggal)
    {
        $this->tanggal = $tanggal;
    }

    public function render()
    {
        $target_time = $this->tanggal;
        $now = Carbon::now();

        if ($target_time > $now) {
            $interval = $now->diff($target_time);
        }

        return view('livewire.partial.countdown', [
            'days' => $interval->d ?? 0,
            'hours' => $interval->h ?? 0,
            'minutes' => $interval->i ?? 0,
            'seconds' => $interval->s ?? 0,
        ]);
    }
}
