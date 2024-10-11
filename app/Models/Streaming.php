<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Streaming extends Model
{
    use HasFactory;

    protected $fillable = [
        'undangan_id',
        'sosmed_id',
        'url',
    ];

    public function undangan()
    {
        return $this->belongsTo(Undangan::class);
    }

    public function sosmed()
    {
        return $this->belongsTo(Sosmed::class);
    }
}
