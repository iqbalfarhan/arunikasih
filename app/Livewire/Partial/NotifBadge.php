<?php

namespace App\Livewire\Partial;

use App\Models\Notif;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotifBadge extends Component
{
    protected $listeners = [
        'reload' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.partial.notif-badge', [
            'notif' => Notif::where('user_id', Auth::id())->where('read', false)->count()
        ]);
    }
}
