<?php

// database/seeders/GameSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Category;

class GameSeeder extends Seeder
{
    public function run()
    {
        $games = [
            // MOBA
            ['category' => 'MOBA', 'name' => 'Mobile Legends', 'image' => 'games/mobile-legends.png'],
            ['category' => 'MOBA', 'name' => 'League of Legends', 'image' => 'games/lol.png'],
            ['category' => 'MOBA', 'name' => 'Dota 2', 'image' => 'games/dota2.png'],

            // RPG
            ['category' => 'RPG', 'name' => 'Genshin Impact', 'image' => 'games/genshin.png'],
            ['category' => 'RPG', 'name' => 'Final Fantasy XV', 'image' => 'games/ff15.png'],
            ['category' => 'RPG', 'name' => 'The Witcher 3', 'image' => 'games/witcher3.png'],

            // Battle Royale
            ['category' => 'Battle Royale', 'name' => 'PUBG Mobile', 'image' => 'games/pubg.png'],
            ['category' => 'Battle Royale', 'name' => 'Fortnite', 'image' => 'games/fortnite.png'],
            ['category' => 'Battle Royale', 'name' => 'Free Fire', 'image' => 'games/freefire.png'],

            // FPS
            ['category' => 'FPS', 'name' => 'Valorant', 'image' => 'games/valorant.png'],
            ['category' => 'FPS', 'name' => 'Counter Strike 2', 'image' => 'games/cs2.png'],
            ['category' => 'FPS', 'name' => 'Call of Duty Mobile', 'image' => 'games/codm.png'],

            // Strategy
            ['category' => 'Strategy', 'name' => 'Clash of Clans', 'image' => 'games/coc.png'],
            ['category' => 'Strategy', 'name' => 'Age of Empires IV', 'image' => 'games/aoe4.png'],

            // Simulation
            ['category' => 'Simulation', 'name' => 'The Sims 4', 'image' => 'games/sims4.png'],
        ];

        foreach ($games as $g) {
            $category = Category::where('name', $g['category'])->first();

            if ($category) {
                Game::create([
                    'category_id' => $category->id,
                    'name'        => $g['name'],
                    'image'       => $g['image'],
                ]);
            }
        }
    }
}

