<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'tema_id',
        'kategori_id',
        'paket_id',
        'shared',
        'paid',
        'data',
    ];
}
