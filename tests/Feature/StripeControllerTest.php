<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

uses(RefreshDatabase::class);

it('can display checkout page', function () {
    $response = $this->get(route('checkout'));
    $response->assertStatus(302); // Expect a redirect response
    $response->assertRedirect(route('checkout')); // Ensure it redirects to the correct route
});

it('can create a checkout session', function () {
    $product = Product::factory()->create();
    $game = Game::factory()->create();

    $cart = [
        $product->id => [
            'type' => 'product',
            'quantity' => 1,
        ],
        $game->id => [
            'type' => 'game',
            'quantity' => 2,
        ],
    ];

    session(['cart' => $cart]);

    $response = $this->post(route('checkout.create'));
    $response->assertRedirect();

    $session = \Stripe\Checkout\Session::retrieve($response->getTargetUrl());
    expect($session->line_items)->toHaveCount(2);
});

it('can handle successful payment', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();
    $game = Game::factory()->create();

    $cart = [
        $product->id => [
            'type' => 'product',
            'quantity' => 1,
        ],
        $game->id => [
            'type' => 'game',
            'quantity' => 2,
        ],
    ];

    session(['cart' => $cart]);
    $this->actingAs($user);

    $response = $this->get(route('checkout.success'));
    $response->assertViewIs('checkout/success');

    $latestOrder = Order::where('user_id', $user->id)
        ->latest('created_at')
        ->with('orderDetails')
        ->first();

    expect($latestOrder)->not()->toBeNull();
});