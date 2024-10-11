<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Ayat;
use App\Models\Music;
use App\Models\Tema;
use App\Models\Undangan;
use Livewire\Component;

class Setting extends Component
{
    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = $undangan;
        $this->ayat = $undangan->ayat;
    }

    public function updateTema($temaId)
    {
        $this->undangan->tema_id = $temaId;
        $this->undangan->save();
    }

    public function updateMusic($musicId)
    {
        $this->undangan->music_id = $musicId;
        $this->undangan->save();
    }

    public function updateAyat($ayatId)
    {
        $this->undangan->ayat_id = $ayatId;
        $this->undangan->save();
    }

    public function render()
    {
        return view('livewire.pages.undangan.setting', [
            'temas' => Tema::get(),
            'ayats' => Ayat::where('kategori_id', $this->undangan->kategori_id)->get(),
            'musics' => Music::get(),
        ])->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}
