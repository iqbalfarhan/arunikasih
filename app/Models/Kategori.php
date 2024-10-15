<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function pakets()
    {
        return $this->hasMany(Paket::class);
    }

    public function undangans()
    {
        return $this->hasMany(Undangan::class);
    }
}
