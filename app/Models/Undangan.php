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
        'user_id',
        'tema_id',
        'kategori_id',
        'paket_id',
        'shared',
        'paid',
        'data',
    ];

    protected function casts()
    {
        return [
            'data' => 'array',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tema()
    {
        return $this->belongsTo(Tema::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function getLinkAttribute()
    {
        return url($this->kategori->name, $this->slug);
    }
}
