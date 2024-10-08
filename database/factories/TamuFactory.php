<?php

namespace Database\Factories;

use App\Models\Undangan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tamu>
 */
class TamuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'undangan_id' => fake()->randomElement(Undangan::pluck('id')),
            'present' => fake()->boolean(),
            'message' => fake()->sentence(),
        ];
    }
}
