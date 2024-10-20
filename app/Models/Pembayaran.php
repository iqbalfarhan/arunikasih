<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public function getImageAttribute()
    {
        return $this->evidence ? Storage::url($this->evidence) : url('nocover.jpg');
    }
}
