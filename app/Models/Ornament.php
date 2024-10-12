<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ornament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ring',
        'topleft',
        'topright',
        'bottomleft',
        'bottomright',
    ];
}
