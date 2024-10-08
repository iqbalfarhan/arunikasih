<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            "pernikahan",
            "syukuran",
            "khitanan",
            "ulang tahun",
            "aqiqah",
        ];

        foreach ($datas as $data) {
            Kategori::create([
                'name' => $data
            ]);
        }
    }
}
