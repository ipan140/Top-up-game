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
        // Topup untuk Mobile Legends
        $ml = Game::where('name', 'Mobile Legends')->first();

        if ($ml) {
            $typesML = [
                // Recharge Bonus
                ['name' => '86 Diamonds (50 + 36 Bonus)',   'price_per_unit' => 17171],
                ['name' => '172 Diamonds (100 + 72 Bonus)', 'price_per_unit' => 34222],
                ['name' => '257 Diamonds (150 + 107 Bonus)', 'price_per_unit' => 51393],
                ['name' => '706 Diamonds (250 + 456 Bonus)', 'price_per_unit' => 136212],
                ['name' => '1412 Diamonds (500 + 912 Bonus)', 'price_per_unit' => 272424],
                ['name' => '2396 Diamonds (1000 + 1396 Bonus)', 'price_per_unit' => 463636],

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
                ['name' => '2010 Diamonds', 'price_per_unit' => 672500],
                ['name' => '4830 Diamonds', 'price_per_unit' => 1160000],

                // Pass
                ['name' => 'Twilight Pass',       'price_per_unit' => 157500],
                ['name' => 'Weekly Diamond Pass', 'price_per_unit' => 27500],
            ];

            foreach ($typesML as $type) {
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

        // Topup untuk League of Legends
        $lol = Game::where('name', 'League of Legends')->first();

        if ($lol) {
            $typesLoL = [
                ['name' => '650 RP',  'price_per_unit' => 10000],
                ['name' => '1380 RP', 'price_per_unit' => 20000],
                ['name' => '2800 RP', 'price_per_unit' => 40000],
                ['name' => '5000 RP', 'price_per_unit' => 70000],
                ['name' => '7200 RP', 'price_per_unit' => 100000],
            ];

            foreach ($typesLoL as $type) {
                TopupType::updateOrCreate(
                    [
                        'game_id' => $lol->id,
                        'name'    => $type['name'],
                    ],
                    [
                        'price_per_unit' => $type['price_per_unit'],
                    ]
                );
            }
            // === League of Legends ===
            $lol = Game::where('name', 'League of Legends')->first();
            if ($lol) {
                $typesLoL = [
                    ['name' => '650 RP',  'price_per_unit' => 10000],
                    ['name' => '1380 RP', 'price_per_unit' => 20000],
                    ['name' => '2800 RP', 'price_per_unit' => 40000],
                    ['name' => '5000 RP', 'price_per_unit' => 70000],
                    ['name' => '7200 RP', 'price_per_unit' => 100000],
                ];
                foreach ($typesLoL as $type) {
                    TopupType::updateOrCreate(
                        ['game_id' => $lol->id, 'name' => $type['name']],
                        ['price_per_unit' => $type['price_per_unit']]
                    );
                }
            }

            // === Dota 2 ===
            $dota = Game::where('name', 'Dota 2')->first();
            if ($dota) {
                $typesDota = [
                    ['name' => '500 Coins',  'price_per_unit' => 10000],
                    ['name' => '1000 Coins', 'price_per_unit' => 20000],
                    ['name' => '2000 Coins', 'price_per_unit' => 40000],
                    ['name' => '5000 Coins', 'price_per_unit' => 90000],
                ];
                foreach ($typesDota as $type) {
                    TopupType::updateOrCreate(
                        ['game_id' => $dota->id, 'name' => $type['name']],
                        ['price_per_unit' => $type['price_per_unit']]
                    );
                }
            }

            // === Arena of Valor (AOV) ===
            $aov = Game::where('name', 'Arena of Valor')->first();
            if ($aov) {
                $typesAOV = [
                    ['name' => '50 Gems',  'price_per_unit' => 10000],
                    ['name' => '100 Gems', 'price_per_unit' => 20000],
                    ['name' => '200 Gems', 'price_per_unit' => 40000],
                    ['name' => '500 Gems', 'price_per_unit' => 90000],
                ];
                foreach ($typesAOV as $type) {
                    TopupType::updateOrCreate(
                        ['game_id' => $aov->id, 'name' => $type['name']],
                        ['price_per_unit' => $type['price_per_unit']]
                    );
                }
            }
        }
        // Genshin Impact
        $genshin = Game::where('name', 'Genshin Impact')->first();
        if ($genshin) {
            $types = [
                ['name' => '60 Genesis Crystals',   'price_per_unit' => 15000],
                ['name' => '300 Genesis Crystals',  'price_per_unit' => 75000],
                ['name' => '980 Genesis Crystals',  'price_per_unit' => 250000],
                ['name' => '1980 Genesis Crystals', 'price_per_unit' => 480000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $genshin->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Final Fantasy XV
        $ff = Game::where('name', 'Final Fantasy XV')->first();
        if ($ff) {
            $types = [
                ['name' => '100 Gil',  'price_per_unit' => 10000],
                ['name' => '500 Gil',  'price_per_unit' => 40000],
                ['name' => '1000 Gil', 'price_per_unit' => 75000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $ff->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // The Witcher 3
        $witcher = Game::where('name', 'The Witcher 3')->first();
        if ($witcher) {
            $types = [
                ['name' => '100 Crowns',  'price_per_unit' => 12000],
                ['name' => '500 Crowns',  'price_per_unit' => 50000],
                ['name' => '1000 Crowns', 'price_per_unit' => 90000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $witcher->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Elden Ring
        $elden = Game::where('name', 'Elden Ring')->first();
        if ($elden) {
            $types = [
                ['name' => '100 Runes',  'price_per_unit' => 15000],
                ['name' => '500 Runes',  'price_per_unit' => 60000],
                ['name' => '1000 Runes', 'price_per_unit' => 110000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $elden->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // PUBG Mobile
        $pubg = Game::where('name', 'PUBG Mobile')->first();
        if ($pubg) {
            $types = [
                ['name' => '60 UC',   'price_per_unit' => 15000],
                ['name' => '325 UC',  'price_per_unit' => 75000],
                ['name' => '660 UC',  'price_per_unit' => 150000],
                ['name' => '1800 UC', 'price_per_unit' => 400000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $pubg->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Fortnite
        $fortnite = Game::where('name', 'Fortnite')->first();
        if ($fortnite) {
            $types = [
                ['name' => '1000 V-Bucks',  'price_per_unit' => 120000],
                ['name' => '2800 V-Bucks',  'price_per_unit' => 300000],
                ['name' => '5000 V-Bucks',  'price_per_unit' => 500000],
                ['name' => '13500 V-Bucks', 'price_per_unit' => 1250000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $fortnite->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Free Fire
        $ffire = Game::where('name', 'Free Fire')->first();
        if ($ffire) {
            $types = [
                ['name' => '50 Diamonds',   'price_per_unit' => 8000],
                ['name' => '210 Diamonds',  'price_per_unit' => 32000],
                ['name' => '560 Diamonds',  'price_per_unit' => 80000],
                ['name' => '1120 Diamonds', 'price_per_unit' => 160000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $ffire->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Apex Legends
        $apex = Game::where('name', 'Apex Legends')->first();
        if ($apex) {
            $types = [
                ['name' => '1000 Coins',  'price_per_unit' => 120000],
                ['name' => '2150 Coins',  'price_per_unit' => 240000],
                ['name' => '4350 Coins',  'price_per_unit' => 480000],
                ['name' => '6700 Coins',  'price_per_unit' => 720000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $apex->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }
        // Valorant
        $valorant = Game::where('name', 'Valorant')->first();
        if ($valorant) {
            $types = [
                ['name' => '475 VP',   'price_per_unit' => 50000],
                ['name' => '1000 VP',  'price_per_unit' => 100000],
                ['name' => '2050 VP',  'price_per_unit' => 200000],
                ['name' => '5350 VP',  'price_per_unit' => 500000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $valorant->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Counter Strike 2
        $cs2 = Game::where('name', 'Counter Strike 2')->first();
        if ($cs2) {
            $types = [
                ['name' => '500 Credits',  'price_per_unit' => 75000],
                ['name' => '1000 Credits', 'price_per_unit' => 140000],
                ['name' => '2500 Credits', 'price_per_unit' => 350000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $cs2->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Call of Duty Mobile
        $codm = Game::where('name', 'Call of Duty Mobile')->first();
        if ($codm) {
            $types = [
                ['name' => '80 CP',    'price_per_unit' => 15000],
                ['name' => '420 CP',   'price_per_unit' => 75000],
                ['name' => '880 CP',   'price_per_unit' => 150000],
                ['name' => '2400 CP',  'price_per_unit' => 400000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $codm->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Overwatch 2
        $overwatch = Game::where('name', 'Overwatch 2')->first();
        if ($overwatch) {
            $types = [
                ['name' => '500 Coins',  'price_per_unit' => 75000],
                ['name' => '1000 Coins', 'price_per_unit' => 150000],
                ['name' => '2200 Coins', 'price_per_unit' => 300000],
                ['name' => '5700 Coins', 'price_per_unit' => 750000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $overwatch->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }
        // Clash of Clans
        $coc = Game::where('name', 'Clash of Clans')->first();
        if ($coc) {
            $types = [
                ['name' => '500 Gems',   'price_per_unit' => 75000],
                ['name' => '1200 Gems',  'price_per_unit' => 150000],
                ['name' => '2500 Gems',  'price_per_unit' => 300000],
                ['name' => '6500 Gems',  'price_per_unit' => 750000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $coc->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Age of Empires IV
        $aoe4 = Game::where('name', 'Age of Empires IV')->first();
        if ($aoe4) {
            $types = [
                ['name' => 'Standard Pack', 'price_per_unit' => 300000],
                ['name' => 'Deluxe Pack',   'price_per_unit' => 500000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $aoe4->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Starcraft II
        $sc2 = Game::where('name', 'Starcraft II')->first();
        if ($sc2) {
            $types = [
                ['name' => '500 Credits',  'price_per_unit' => 80000],
                ['name' => '1000 Credits', 'price_per_unit' => 150000],
                ['name' => '2500 Credits', 'price_per_unit' => 350000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $sc2->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Total War: Warhammer III
        $tww3 = Game::where('name', 'Total War: Warhammer III')->first();
        if ($tww3) {
            $types = [
                ['name' => 'Base Pack',     'price_per_unit' => 400000],
                ['name' => 'Expansion DLC', 'price_per_unit' => 250000],
                ['name' => 'Ultimate Pack', 'price_per_unit' => 900000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $tww3->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }
        // The Sims 4
        $sims4 = Game::where('name', 'The Sims 4')->first();
        if ($sims4) {
            $types = [
                ['name' => 'Expansion Pack', 'price_per_unit' => 350000],
                ['name' => 'Game Pack',      'price_per_unit' => 200000],
                ['name' => 'Stuff Pack',     'price_per_unit' => 100000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $sims4->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Cities: Skylines
        $cities = Game::where('name', 'Cities: Skylines')->first();
        if ($cities) {
            $types = [
                ['name' => 'Base Game',    'price_per_unit' => 300000],
                ['name' => 'Expansion DLC', 'price_per_unit' => 200000],
                ['name' => 'Ultimate Pack', 'price_per_unit' => 700000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $cities->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Planet Zoo
        $planetZoo = Game::where('name', 'Planet Zoo')->first();
        if ($planetZoo) {
            $types = [
                ['name' => 'Base Game',     'price_per_unit' => 400000],
                ['name' => 'DLC Pack',      'price_per_unit' => 150000],
                ['name' => 'Deluxe Edition', 'price_per_unit' => 600000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $planetZoo->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }

        // Microsoft Flight Simulator
        $msfs = Game::where('name', 'Microsoft Flight Simulator')->first();
        if ($msfs) {
            $types = [
                ['name' => 'Standard Edition', 'price_per_unit' => 600000],
                ['name' => 'Deluxe Edition',   'price_per_unit' => 1000000],
                ['name' => 'Premium Deluxe',   'price_per_unit' => 1400000],
            ];

            foreach ($types as $type) {
                TopupType::updateOrCreate(
                    ['game_id' => $msfs->id, 'name' => $type['name']],
                    ['price_per_unit' => $type['price_per_unit']]
                );
            }
        }
    }
}
