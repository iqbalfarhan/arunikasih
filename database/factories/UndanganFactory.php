<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Undangan>
 */
class UndanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name',
            'slug',
            'tema_id',
            'kategori_id',
            'paket_id',
            'shared',
            'paid',
            'data',
        ];
    }
}
