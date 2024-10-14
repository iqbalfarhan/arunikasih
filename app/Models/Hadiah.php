<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hadiah extends Model
{
    use HasFactory;

    protected $fillable = [
        'undangan_id',
        'type',
        'bank_id',
        'pic',
        'value',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function undangan()
    {
        return $this->belongsTo(Undangan::class);
    }
}
