<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Kategori::pluck('id') as $kat) {
            Paket::factory(3)->create([
                'kategori_id' => $kat
            ]);
        }
    }
}
