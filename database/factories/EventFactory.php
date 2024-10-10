<?php

namespace Database\Factories;

use App\Models\Undangan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
            'name' => fake()->words(2, true),
            'location_name' => fake()->city(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'datetime' => fake()->dateTime(),
        ];
    }
}
