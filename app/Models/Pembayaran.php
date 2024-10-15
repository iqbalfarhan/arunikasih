<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
