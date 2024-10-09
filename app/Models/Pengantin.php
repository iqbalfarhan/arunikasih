<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengantin extends Model
{
    use HasFactory;

    protected $fillable = [
        'undangan_id', // pria atau wanita
        'gender', // pria atau wanita
        'name',
        'father',
        'mother',
        'child', // anak ke berapa contoh:pertama, kedua ketiga ...
        'photo'
    ];

    public function getTextAttribute()
    {
        return implode(" ", [
            $this->gender == "pria" ? "Putra" : "Putri",
            $this->child,
            "dari bapak",
            $this->father,
            "dan ibu",
            $this->mother,
        ]);
    }
}
