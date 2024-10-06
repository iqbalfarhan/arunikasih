<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Paket;
use App\Models\Tema;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = implode(" ", [fake()->firstNameMale(), 'dan', fake()->firstNameFemale()]);
        return [
            'name' => $title,
            'slug' => Str::slug($title),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'tema_id' => fake()->randomElement(Tema::pluck('id')),
            'kategori_id' => fake()->randomElement(Kategori::pluck('id')),
            'paket_id' => fake()->randomElement(Paket::pluck('id')),
            'shared' => fake()->boolean(),
            'paid' => fake()->boolean(),
            'data' => null,
        ];
    }
}
