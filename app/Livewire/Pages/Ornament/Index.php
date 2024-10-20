<?php

namespace App\Livewire\Pages\Ornament;

use App\Models\Ornament;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    public $no = 1;
    public $cari;

    public function hapusGambar(Ornament $ornament, $posisi)
    {
        if ($posisi == "ring") {
            $ornament->ring = null;
        }
        elseif ($posisi == "topleft") {
            $ornament->topleft = null;
        }
        elseif ($posisi == "topright") {
            $ornament->topright = null;
        }
        elseif ($posisi == "bottomleft") {
            $ornament->bottomleft = null;
        }
        elseif ($posisi == "bottomright") {
            $ornament->bottomright = null;
        }

        $ornament->save();

        $this->alert('success', 'Data ornament berhasil disimpan');
        $this->dispatch('reload');
    }

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.ornament.index', [
            'datas' => Ornament::get()
        ]);
    }
}
