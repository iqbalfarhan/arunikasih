<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ayat>
 */
class AyatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kategori_id' => fake()->randomElement(Kategori::pluck('id')),
            'surah' => fake()->words(3, true),
            'content' => fake()->sentences(2, true)
        ];
    }
}
