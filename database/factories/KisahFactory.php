<?php

namespace Database\Factories;

use App\Models\Undangan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kisah>
 */
class KisahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'undangan_id' => fake()->randomElement(Undangan::pluck('id')),
            'title' => fake()->words(4, true),
            'content' => fake()->sentences(4, true),
        ];
    }
}
