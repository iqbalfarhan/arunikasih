<?php

namespace App\Livewire\Partial;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Header extends Component
{
    public $title;

    public function mount($title = "Dashboard")
    {
        $this->title = $title;
    }

    public function render()
    {
        $routeName = Route::currentRouteName();
        return view('livewire.partial.header', [
            'role' => auth()->user()->getRoleNames()->first() ?? "guest",
            'routes' => explode('.', $routeName)
        ]);
    }
}
