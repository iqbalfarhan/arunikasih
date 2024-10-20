<?php

namespace App\Livewire\Pages\Pembayaran;

use App\Livewire\Forms\PembayaranForm;
use App\Models\Bank;
use App\Models\Pembayaran;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
    use LivewireAlert, WithFileUploads;
    public Pembayaran $pembayaran;
    public $buktibayar;
    protected $listeners = ['reload' => '$refresh'];
    public PembayaranForm $form;

    public function mount(Pembayaran $pembayaran)
    {
        $this->pembayaran = $pembayaran;
        $this->form->setPembayaran($pembayaran);
    }

    public function simpan()
    {
        if ($this->buktibayar) {
            $this->form->confirmed = true;
            $this->form->evidence = $this->buktibayar->store('buktibayar');
        }

        $this->form->update();
        $this->dispatch('reload');
        $this->alert('success', 'bukti pembayaran berhasil disimpan');
    }

    public function render()
    {
        return view('livewire.pages.pembayaran.show', [
            'banks' => Bank::pluck('name', 'id')
        ]);
    }
}
