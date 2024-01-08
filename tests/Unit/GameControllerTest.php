<?php

use App\Models\Game;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(RefreshDatabase::class);

it('can get all games', function () {
    $games = Game::factory()->count(5)->create();

    $response = $this->get(route('games.index'));

    $response->assertStatus(200);
    $response->assertViewIs('games.index');
    $response->assertViewHas('games', $games);
});

it('can get all games for admin view', function () {
    $games = Game::factory()->count(5)->create();

    $response = $this->get(route('admin.games'));

    $response->assertStatus(200);
    $response->assertViewIs('admin.games.games');
    $response->assertViewHas('games', $games);
});

it('can search for games', function () {
    $game1 = Game::factory()->create(['name' => 'Game 1']);
    $game2 = Game::factory()->create(['name' => 'Game 2']);

    $response = $this->get(route('games.search', ['search' => 'Game 1']));

    $response->assertStatus(200);
    $response->assertViewIs('games.index');
    $response->assertViewHas('games', collect([$game1]));
});

it('can show games by category', function () {
    $genre = 'action';
    $games = Game::factory()->count(5)->create(['genre' => $genre]);

    $response = $this->get(route('games.category', ['genre' => $genre]));

    $response->assertStatus(200);
    $response->assertViewIs('games.partials.category');
    $response->assertViewHas('games', $games);
    $response->assertViewHas('genre', $genre);
});

it('can show game details', function () {
    $game = Game::factory()->create();

    $response = $this->get(route('games.details', ['id' => $game->id]));

    $response->assertStatus(200);
    $response->assertViewIs('games.partials.details-component');
    $response->assertViewHas('game', $game);
});

it('can create a game', function () {
    $genres = ['action', 'adventure', 'rpg', 'shooter', 'simulation', 'strategy', 'battle royale'];
    $gameData = Game::factory()->make()->toArray();

    $response = $this->post(route('games.store'), $gameData);

    $response->assertStatus(302);
    $response->assertRedirect(route('admin.games'));
    $this->assertDatabaseHas('games', $gameData);
});

it('can update a game', function () {
    $game = Game::factory()->create();
    $updatedGameData = Game::factory()->make()->toArray();

    $response = $this->put(route('games.update', ['id' => $game->id]), $updatedGameData);

    $response->assertStatus(302);
    $response->assertRedirect(route('admin.games'));
    $this->assertDatabaseHas('games', $updatedGameData);
});

it('can delete a game', function () {
    $game = Game::factory()->create();

    $response = $this->delete(route('games.destroy', ['id' => $game->id]));

    $response->assertStatus(302);
    $response->assertRedirect(route('admin.games'));
    $this->assertDatabaseMissing('games', ['id' => $game->id]);
});