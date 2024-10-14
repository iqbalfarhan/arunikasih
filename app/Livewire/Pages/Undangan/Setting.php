<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Ayat;
use App\Models\Music;
use App\Models\Ornament;
use App\Models\Tema;
use App\Models\Undangan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Setting extends Component
{
    use LivewireAlert;
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
        $this->alert('success', 'Tema undangan berhasil diupdate');
    }

    public function updateOrnament($ornamentId)
    {
        $this->undangan->ornament_id = $ornamentId;
        $this->undangan->save();
        $this->alert('success', 'Ornament undangan berhasil diupdate');
    }

    public function updateMusic($musicId)
    {
        $this->undangan->music_id = $musicId;
        $this->undangan->save();
        $this->alert('success', 'Music undangan berhasil diupdate');
    }

    public function updateAyat($ayatId)
    {
        $this->undangan->ayat_id = $ayatId;
        $this->undangan->save();
        $this->alert('success', 'Ayat undangan berhasil diupdate');
    }

    public function hapusAyat()
    {
        $this->undangan->ayat_id = null;
        $this->undangan->save();
        $this->alert('success', 'Ayat undangan berhasil direset');
    }

    public function render()
    {
        return view('livewire.pages.undangan.setting', [
            'temas' => Tema::get(),
            'ayats' => Ayat::where('kategori_id', $this->undangan->kategori_id)->get(),
            'musics' => Music::get(),
            'ornaments' => Ornament::get(),
        ])->layout('components.layouts.undangan', [
            'undangan' => $this->undangan,
        ]);
    }
}
