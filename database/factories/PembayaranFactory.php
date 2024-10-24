<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\Paket;
use App\Models\Undangan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = fake()->randomElement(Undangan::pluck('id'));
        $undangan = Undangan::find($id);
        $confirmed = fake()->boolean();

        return [
            'user_id' => $undangan->user_id,
            'undangan_id' => $id,
            'via' => $confirmed ? fake()->randomElement(Bank::pluck('name')) : null,
            'amount' => $undangan->paket->price,
            'confirmed' => $confirmed,
            'confirmed_at' => $confirmed ? fake()->dateTime() : null,
        ];
    }
}
