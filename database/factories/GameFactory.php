<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    protected $model = Game::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'genre' => $this->faker->randomElement(['action', 'adventure', 'rpg', 'shooter', 'simulation', 'strategy', 'battle royale']),
        ];
    }
}