<?php

namespace Database\Seeders;

use App\Models\Hadiah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HadiahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hadiah::factory(20)->create();
    }
}
