<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jika ingin pakai factory default user
        // \App\Models\User::factory(10)->create();

        // Panggil semua seeder yang dibutuhkan
        $this->call([
            CategorySeeder::class,
            UserSeeder::class, // 👈 tambahkan seeder user
        ]);
    }
}
