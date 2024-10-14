<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\Undangan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hadiah>
 */
class HadiahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipe = fake()->randomElement(['rekening', 'alamat']);
        return [
            'undangan_id' => fake()->randomElement(Undangan::pluck('id')),
            'type' => $tipe,
            'bank_id' => $tipe == "alamat" ? null : fake()->randomElement(Bank::pluck('id')),
            'pic' => fake()->name(),
            'value' => $tipe == "alamat" ? fake()->address() : fake()->creditCardNumber(),
        ];
    }
}
