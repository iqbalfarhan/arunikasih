<?php

namespace Database\Seeders;

use App\Models\Fitur;
use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            // fitur undangan pernikahan
            [
                'name' => 'cover undangan',
                'description' => 'Halaman awal undangan, disini terdapat label nama tamu yang diundang',
                'kategori_id' => Kategori::where('name', 'pernikahan')->first()->id,
            ],
            [
                'name' => 'musik latar',
                'description' => 'Musik latar belakang undangan, terdapat kontrol untuk play dan pause',
                'kategori_id' => Kategori::where('name', 'pernikahan')->first()->id,
            ],
            [
                'name' => 'intro undangan',
                'description' => 'Ucapan salam dari pemilik undangan kepada tamu',
                'kategori_id' => Kategori::where('name', 'pernikahan')->first()->id,
            ],
            [
                'name' => 'data pengantin',
                'description' => 'data pengantin pria dan pengantin wanita',
                'kategori_id' => Kategori::where('name', 'pernikahan')->first()->id,
            ],
            [
                'name' => 'detail acara',
                'description' => 'detail tanggal, waktu dan lokasi acara akad dan resepsi',
                'kategori_id' => Kategori::where('name', 'pernikahan')->first()->id,
            ],
            [
                'name' => 'photo prewedding',
                'description' => 'upload kumpulan photo prewedding atau photo kebersamaan',
                'kategori_id' => Kategori::where('name', 'pernikahan')->first()->id,
            ],
            [
                'name' => 'kisah cinta',
                'description' => 'kisah cinta dari awal bertemu',
                'kategori_id' => Kategori::where('name', 'pernikahan')->first()->id,
            ],
            [
                'name' => 'rsvp dan ucapan',
                'description' => 'ucapan selamat atau doa dan kehadiran dari tamu yang menerima undangan',
                'kategori_id' => Kategori::where('name', 'pernikahan')->first()->id,
            ],
            [
                'name' => 'live streaming',
                'description' => 'link live streaming media sosial prosesi pernikahan',
                'kategori_id' => Kategori::where('name', 'pernikahan')->first()->id,
            ],
            [
                'name' => 'hadiah dan rekening',
                'description' => 'alamat pengiriman hadiah dan nomor rekening',
                'kategori_id' => Kategori::where('name', 'pernikahan')->first()->id,
            ],
            [
                'name' => 'protokol kesehatan',
                'description' => 'Protokol kesehatan Covid 19',
                'kategori_id' => Kategori::where('name', 'pernikahan')->first()->id,
            ],
            // fitur undangan aqiqah
            [
                'name' => 'cover undangan',
                'description' => 'Halaman awal undangan, disini terdapat label nama tamu yang diundang',
                'kategori_id' => Kategori::where('name', 'aqiqah')->first()->id,
            ],
            [
                'name' => 'musik latar',
                'description' => 'Musik latar belakang undangan, terdapat kontrol untuk play dan pause',
                'kategori_id' => Kategori::where('name', 'aqiqah')->first()->id,
            ],
            [
                'name' => 'intro undangan',
                'description' => 'Ucapan salam dari pemilik undangan kepada tamu',
                'kategori_id' => Kategori::where('name', 'aqiqah')->first()->id,
            ],
            [
                'name' => 'data anak',
                'description' => 'data anak yang akan diakikah',
                'kategori_id' => Kategori::where('name', 'aqiqah')->first()->id,
            ],
            [
                'name' => 'detail acara',
                'description' => 'detail tanggal, waktu dan lokasi acara syukuran aqiqah',
                'kategori_id' => Kategori::where('name', 'aqiqah')->first()->id,
            ],
            [
                'name' => 'rsvp dan ucapan',
                'description' => 'ucapan selamat atau doa dan kehadiran dari tamu yang menerima undangan',
                'kategori_id' => Kategori::where('name', 'aqiqah')->first()->id,
            ],
            [
                'name' => 'protokol kesehatan',
                'description' => 'Protokol kesehatan Covid 19',
                'kategori_id' => Kategori::where('name', 'aqiqah')->first()->id,
            ],
        ];

        foreach ($datas as $data) {
            Fitur::create($data);
        }

        Fitur::factory(30)->create();
    }
}
