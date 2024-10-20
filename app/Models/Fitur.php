<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitur extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
