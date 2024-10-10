<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            "name" => "Administrator",
            "email" => "admin@gmail.com",
            "password" => "admin",
        ]);
        $user->assignRole("superadmin");

        $user = User::factory()->create([
            "name" => "User Contoh",
            "email" => "user@gmail.com",
            "password" => "user",
        ]);
        $user->assignRole("user");

        User::factory(10)
            ->create()
            ->each(fn($user) => $user->assignRole("user"));
    }
}
