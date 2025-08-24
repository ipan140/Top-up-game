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
        // Panggil semua seeder yang dibutuhkan
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            GameSeeder::class,
            TopupTypeSeeder::class,
        ]);
    }
}
