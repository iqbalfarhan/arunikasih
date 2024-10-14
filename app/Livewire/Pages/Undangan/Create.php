<?php

namespace App\Livewire\Pages\Undangan;

use App\Livewire\Forms\UndanganForm;
use App\Models\Ayat;
use App\Models\Kategori;
use App\Models\Music;
use App\Models\Paket;
use App\Models\Tema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public UndanganForm $form;

    public function simpan()
    {
        $this->form->slug = Str::slug($this->form->name);
        $this->form->user_id = Auth::id();
        $this->form->tema_id = Tema::get()->first()->id;
        $this->form->music_id = Music::get()->first()->id;
        $this->form->ayat_id = Ayat::get()->first()->id;
        $this->form->event_date = now();

        $this->form->store();

        $this->alert('success', 'Data undangan berhasil disimpan');
        $this->dispatch('reload');

        $this->redirect(route('undangan.mine'), true);
    }

    public function render()
    {
        return view('livewire.pages.undangan.create', [
            'kategoris' => Kategori::pluck('name', 'id'),
            'pakets' => Paket::when($this->form->kategori_id, function($q){
                $q->where('kategori_id', $this->form->kategori_id);
            })->pluck('name', 'id')
        ]);
    }
}
