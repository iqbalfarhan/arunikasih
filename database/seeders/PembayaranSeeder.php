<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use App\Models\Undangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $undangans = Undangan::pluck('id');
        foreach ($undangans as $undangan_id) {
            Pembayaran::factory()->create([
                'undangan_id' => $undangan_id
            ]);
        }
    }
}
