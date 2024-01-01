<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::create([
            'name' => 'Sample Game 1',
            'description' => 'This is a sample game description.',
            'genre' => 'Adventure',
            'release_date' => '2022-01-01',
            'platform' => 'PC',
            'rating' => 4.5,
            'publisher' => 'Sample Publisher',
            'image' => 'sample1.jpg',
            'developer' => 'Sample Developer',
            'multiplayer' => true,
            'price' => '59.99'
        ]);

        Game::create([
            'name' => 'Sample Game 2',
            'description' => 'Another sample game description.',
            'genre' => 'Action',
            'release_date' => '2022-02-01',
            'platform' => 'Console',
            'rating' => 3.8,
            'publisher' => 'Another Publisher',
            'image' => 'sample2.jpg',
            'developer' => 'Another Developer',
            'multiplayer' => false,
            'price' => '49.99'
        ]);
    }
}