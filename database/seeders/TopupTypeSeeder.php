<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TopupType;
use App\Models\Game;

class TopupTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // cari game Mobile Legends
        $ml = Game::where('name', 'Mobile Legends')->first();

        if ($ml) {
            $types = [
                // Recharge Bonus
                ['name' => '86 Diamonds (50 + 36 Bonus)',   'price_per_unit' => 17171],
                ['name' => '172 Diamonds (100 + 72 Bonus)', 'price_per_unit' => 34222],
                ['name' => '257 Diamonds (150 + 107 Bonus)','price_per_unit' => 51393],
                ['name' => '706 Diamonds (250 + 456 Bonus)','price_per_unit' => 136212],
                ['name' => '1412 Diamonds (500 + 912 Bonus)','price_per_unit' => 272424],
                ['name' => '2396 Diamonds (1000 + 1396 Bonus)','price_per_unit' => 463636],

                // Normal Diamonds
                ['name' => '3 Diamonds',   'price_per_unit' => 1717],
                ['name' => '5 Diamonds',   'price_per_unit' => 2850],
                ['name' => '12 Diamonds',  'price_per_unit' => 5132],
                ['name' => '19 Diamonds',  'price_per_unit' => 7222],
                ['name' => '44 Diamonds',  'price_per_unit' => 17171],
                ['name' => '59 Diamonds',  'price_per_unit' => 21350],
                ['name' => '85 Diamonds',  'price_per_unit' => 28500],
                ['name' => '170 Diamonds', 'price_per_unit' => 57000],
                ['name' => '240 Diamonds', 'price_per_unit' => 81750],
                ['name' => '296 Diamonds', 'price_per_unit' => 100500],
                ['name' => '408 Diamonds', 'price_per_unit' => 140500],
                ['name' => '568 Diamonds', 'price_per_unit' => 192500],
                ['name' => '875 Diamonds', 'price_per_unit' => 292500],
                ['name' => '2010 Diamonds','price_per_unit' => 672500],
                ['name' => '4830 Diamonds','price_per_unit' => 1160000],

                // Pass
                ['name' => 'Twilight Pass',       'price_per_unit' => 157500],
                ['name' => 'Weekly Diamond Pass', 'price_per_unit' => 27500],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    [
                        'game_id' => $ml->id,
                        'name'    => $type['name'],
                    ],
                    [
                        'price_per_unit' => $type['price_per_unit'],
                    ]
                );
            }
        }
    }
}
