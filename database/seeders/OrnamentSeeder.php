<?php

namespace Database\Seeders;

use App\Models\Ornament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrnamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'leaf',
            'ice',
            'light',
            'luxury',
            'pink',
        ];

        foreach ($datas as $data) {
            Ornament::updateOrCreate([
                'name' => $data,
            ]);
        }
        // Ornament::factory(3)->create();
    }
}
