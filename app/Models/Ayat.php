<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayat extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'surah',
        'content',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
