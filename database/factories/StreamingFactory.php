<?php

namespace Database\Factories;

use App\Models\Sosmed;
use App\Models\Undangan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Streaming>
 */
class StreamingFactory extends Factory
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
            'sosmed_id' => fake()->randomElement(Sosmed::pluck('id')),
            'url' => fake()->domainName(),
        ];
    }
}
