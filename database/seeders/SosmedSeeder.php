<?php

namespace Database\Seeders;

use App\Models\Sosmed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SosmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sosmeds = [
            "Instagram",
            "Youtube",
            "Facebook",
        ];

        foreach($sosmeds as $sosmed)
        {
            Sosmed::factory()->create([
                'name' => $sosmed,
            ]);
        }
    }
}
