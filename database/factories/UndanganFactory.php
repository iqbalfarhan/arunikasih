<?php

namespace Database\Factories;

use App\Models\Ayat;
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
        $title = implode(" ", [fake()->firstNameMale(), '&', fake()->firstNameFemale()]);
        $kat_id = fake()->randomElement(Kategori::pluck('id'));
        return [
            'name' => $title,
            'slug' => Str::slug($title),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'tema_id' => fake()->randomElement(Tema::pluck('id')),
            'kategori_id' => $kat_id,
            'paket_id' => fake()->randomElement(Paket::where('kategori_id', $kat_id)->pluck('id')),
            'ayat_id' => fake()->randomElement(Ayat::pluck('id')),
            'shared' => fake()->boolean(),
            'paid' => fake()->boolean(),
            'event_date' => fake()->date('Y-m-d', "2024-12-31"),
        ];
    }
}
