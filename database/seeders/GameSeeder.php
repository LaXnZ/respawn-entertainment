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
            'name' => 'The Finals',
            'description' => 'Finals is a game about the NBA Finals.',
            'genre' => 'battle royale',
            'release_date' => '2022-02-01',
            'platform' => 'Console',
            'rating' => 3.8,
            'publisher' => 'Another Publisher',
            'image' => 'sample3.jpg',
            'developer' => 'Steam Developer',
            'multiplayer' => false,
            'price' => '149.99'
        ]);
    }
}