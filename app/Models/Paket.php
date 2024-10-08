<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'kategori_id',
    ];

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function fiturs()
    {
        return $this->belongsToMany(Fitur::class, 'paket_fitur');
    }
}
