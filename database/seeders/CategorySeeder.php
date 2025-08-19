<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Mobile Legends',
            'image' => 'mlbb.jpg',
            'description' => 'Game MOBA populer dengan hero beragam.'
        ]);

        Category::create([
            'name' => 'Free Fire',
            'image' => 'freefire.png',
            'description' => 'Game battle royale ringan dan cepat.'
        ]);

        Category::create([
            'name' => 'PUBG Mobile',
            'image' => 'pubg.jpg',
            'description' => 'Game battle royale dengan grafis realistis.'
        ]);

        Category::create([
            'name' => 'Valorant',
            'image' => 'valorant.jpg',
            'description' => 'Game FPS kompetitif dengan agen dan skill unik.'
        ]);
    }
}
