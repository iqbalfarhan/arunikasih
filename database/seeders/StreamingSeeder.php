<?php

namespace Database\Seeders;

use App\Models\Streaming;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StreamingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Streaming::factory(12)->create();
    }
}
