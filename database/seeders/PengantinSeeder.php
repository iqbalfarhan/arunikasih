<?php

namespace Database\Seeders;

use App\Models\Pengantin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengantinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengantin::factory(10)->create();
    }
}
