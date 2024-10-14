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
            $pakets = [
                [
                    "name" => "basic",
                    "harga" => "10000",
                ],
                [
                    "name" => "standard",
                    "harga" => "20000",
                ],
                [
                    "name" => "lengkap",
                    "harga" => "30000",
                ]
            ];
            foreach ($pakets as $paket) {
                Paket::factory()->create([
                    'kategori_id' => $kat,
                    "name" => $paket['name'],
                    "price" => $paket['harga']
                ]);
            }
        }
    }
}
