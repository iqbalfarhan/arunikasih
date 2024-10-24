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
    public $user_id;
    public $via;
    public $amount;
    public $confirmed = false;
    public $confirmed_at;
    public $evidence;
    public $notes;

    public function setPembayaran(Pembayaran $pembayaran){
        $this->pembayaran = $pembayaran;

        $this->user_id = $pembayaran->user_id;
        $this->undangan_id = $pembayaran->undangan_id;
        $this->via = $pembayaran->via;
        $this->amount = $pembayaran->amount;
        $this->confirmed = $pembayaran->confirmed ? "1" : "0";
        $this->confirmed_at = $pembayaran->confirmed_at;
        $this->evidence = $pembayaran->evidence;
        $this->notes = $pembayaran->notes;
    }

    public function store(){
        $valid = $this->validate([
            'user_id' => 'required',
            'undangan_id' => 'required',
            'via' => '',
            'amount' => 'required',
            'confirmed' => '',
            'confirmed_at' => '',
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
            'user_id' => 'required',
            'undangan_id' => 'required',
            'via' => '',
            'amount' => '',
            'confirmed' => '',
            'confirmed_at' => '',
            'notes' => '',
        ]);

        $valid['confirmed_at'] = $this->confirmed ? now() : null;

        if ($this->evidence) {
            $valid['evidence'] = $this->evidence;
        }

        $this->pembayaran->update($valid);

        // $this->reset();
    }

}
