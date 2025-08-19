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
        $categories = [
            [
                'name' => 'MOBA',
                'description' => 'Game dengan tim yang bertarung di arena pertempuran dengan hero unik.'
            ],
            [
                'name' => 'RPG',
                'description' => 'Game role-playing dengan cerita, leveling, dan perkembangan karakter.'
            ],
            [
                'name' => 'Battle Royale',
                'description' => 'Game bertahan hidup dengan banyak pemain di arena hingga tersisa satu pemenang.'
            ],
            [
                'name' => 'FPS',
                'description' => 'Game tembak-menembak dengan sudut pandang orang pertama.'
            ],
            [
                'name' => 'Strategy',
                'description' => 'Game yang berfokus pada perencanaan dan pengelolaan sumber daya.'
            ],
            [
                'name' => 'Simulation',
                'description' => 'Game yang meniru kehidupan nyata atau aktivitas tertentu.'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
