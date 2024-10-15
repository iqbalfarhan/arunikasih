<?php

namespace App\Livewire\Forms;

use App\Models\Pembayaran;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PembayaranForm extends Form
{
    public ?Pembayaran $pembayaran;

    public $undangan_id;
    public $via;
    public $amount;
    public $confirmed = false;
    public $confirmed_at;
    public $evidence;
    public $notes;

    public function setPembayaran(Pembayaran $pembayaran){
        $this->pembayaran = $pembayaran;

        $this->undangan_id = $pembayaran->undangan_id;
        $this->via = $pembayaran->via;
        $this->amount = $pembayaran->amount;
        $this->confirmed = $pembayaran->confirmed;
        $this->confirmed_at = $pembayaran->confirmed_at;
        $this->evidence = $pembayaran->evidence;
        $this->notes = $pembayaran->notes;
    }

    public function store(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'via' => 'required',
            'amount' => 'required',
            'confirmed' => 'required',
            'confirmed_at' => 'required',
            'notes' => '',
        ]);

        if ($this->evidence) {
            $valid['evidence'] = $this->evidence;
        }

        Pembayaran::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'undangan_id' => 'required',
            'via' => 'required',
            'amount' => 'required',
            'confirmed' => 'required',
            'confirmed_at' => 'required',
            'notes' => '',
        ]);

        if($this->confirmed == false){
            $valid['confirmed_at'] = null;
        }

        if ($this->evidence) {
            $valid['evidence'] = $this->evidence;
        }

        $this->pembayaran->update($valid);

        $this->reset();
    }

}
