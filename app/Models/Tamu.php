<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "undangan_id",
        "present",
        "message",
        "reply",
    ];

    public function undangan()
    {
        return $this->belongsTo(Undangan::class);
    }
}
