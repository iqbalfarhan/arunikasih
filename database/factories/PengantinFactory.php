<?php

namespace Database\Factories;

use App\Models\Undangan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengantin>
 */
class PengantinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['pria', 'wanita']);
        return [
            'undangan_id' => fake()->randomElement(Undangan::pluck('id')),
            'gender' => $gender,
            'name' => $gender == "pria" ? fake()->firstNameMale() : fake()->firstNameFemale() ." ". fake()->lastName(),
            'father' => fake()->name("male"),
            'mother' => fake()->name("female"),
            'child' => fake()->randomElement(['pertama', 'kedua', 'ketiga']),
            'photo' => null,
        ];
    }
}
