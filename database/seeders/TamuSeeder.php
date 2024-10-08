<?php

namespace Database\Seeders;

use App\Models\Tamu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tamu::factory(100)->create();
    }
}
