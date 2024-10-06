<?php

namespace Database\Seeders;

use App\Models\Fitur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fitur::factory(12)->create();
    }
}
