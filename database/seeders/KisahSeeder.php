<?php

namespace Database\Seeders;

use App\Models\Kisah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KisahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kisah::factory(50)->create();
    }
}
