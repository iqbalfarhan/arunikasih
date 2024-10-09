<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'undangan_id',
        'name',
        'location_name',
        'latitude',
        'longitude',
        'datetime',
    ];

    protected function casts()
    {
        return [
            'datetime' => 'datetime'
        ];
    }
}
