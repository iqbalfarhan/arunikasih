<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'filename',
    ];

    public function getImageAttribute()
    {
        return $this->filename ? Storage::url($this->filename) : url('nouser.jpg');
    }
}
