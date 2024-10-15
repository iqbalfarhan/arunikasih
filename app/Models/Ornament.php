<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getDefaultRingAttribute()
    {
        return $this->ring ? Storage::url($this->ring) : url('ornament/noring.png');
    }
}
