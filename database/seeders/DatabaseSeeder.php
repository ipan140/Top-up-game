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
        // contoh seeder user
        // \App\Models\User::factory(10)->create();

        // panggil CategorySeeder
        $this->call([
            CategorySeeder::class,
        ]);
    }
}
