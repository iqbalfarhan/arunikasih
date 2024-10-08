<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,

            MusicSeeder::class,
            RatingSeeder::class,
            AyatSeeder::class,
            KategoriSeeder::class,
            BankSeeder::class,
            FiturSeeder::class,
            PaketSeeder::class,
            TemaSeeder::class,
            UndanganSeeder::class,
            TamuSeeder::class,
            PengantinSeeder::class,
            EventSeeder::class,
            KisahSeeder::class
        ]);
    }
}
