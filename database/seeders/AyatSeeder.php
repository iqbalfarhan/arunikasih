<?php

namespace Database\Seeders;

use App\Models\Ayat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AyatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ayat::factory(10)->create();
    }
}
