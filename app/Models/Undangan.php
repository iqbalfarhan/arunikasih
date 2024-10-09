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
        'ayat_id',
        'shared',
        'paid',
        'event_date'
    ];

    protected function casts()
    {
        return [
            'paid' => 'boolean',
            'shared' => 'boolean',
            'event_date' => 'date',
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

    public function ayat()
    {
        return $this->belongsTo(Ayat::class);
    }

    public function getLinkAttribute()
    {
        return url($this->kategori->name, $this->slug);
    }

    public function tamus()
    {
        return $this->hasMany(Tamu::class);
    }

    public function pengantins()
    {
        return $this->hasMany(Pengantin::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
