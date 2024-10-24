<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'undangan_id',
        'via',
        'amount',
        'confirmed',
        'confirmed_at',
        'evidence',
        'notes',
    ];

    protected function casts()
    {
        return [
            'confirmed' => 'boolean',
            'confirmed_at' => 'datetime',
        ];
    }

    public function undangan(){
        return $this->belongsTo(Undangan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getImageAttribute()
    {
        return $this->evidence ? Storage::url($this->evidence) : url('nocover.jpg');
    }

    public function getInvoiceNumberAttribute()
    {
        return str_pad($this->id, 8, 0, STR_PAD_LEFT);
    }

    public function getWaitingAttribute()
    {
        return !is_null($this->evidence) && !$this->confirmed;
    }
}
