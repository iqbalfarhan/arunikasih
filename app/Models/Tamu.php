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
        "shared",
        "read",
        "present",
        "message",
        "reply",
    ];

    public function undangan()
    {
        return $this->belongsTo(Undangan::class);
    }

    public function getLinkAttribute()
    {
        return implode('?',[
            $this->undangan->link,
            http_build_query([
                'yth' => $this->name
            ])
        ]);
    }
}
