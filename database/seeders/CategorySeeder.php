<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'IT yangiliklar',
            'slug' => 'it-news'
        ]);

        Category::create([
            'name' => 'Dizayn',
            'slug' => 'design'
        ]);

        Category::create([
            'name' => 'Web',
            'slug' => 'web'
        ]);

        Category::create([
            'name' => "O'yin",
            'slug' => 'game'
        ]);

        Category::create([
            'name' => 'Android',
            'slug' => 'android'
        ]);

        Category::create([
            'name' => 'IOS',
            'slug' => 'ios'
        ]);
    }
}
