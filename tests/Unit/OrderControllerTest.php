<?php

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('can create an order', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();
    $game = Game::factory()->create();

    $response = $this->actingAs($user)
        ->post(route('order.store'), [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'mobile' => '1234567890',
            'email' => 'john@example.com',
            'line1' => '123 Street',
            'line2' => 'Apt 4B',
            'city' => 'New York',
            'postalcode' => '12345',
            'cart' => [
                $product->id => [
                    'type' => 'product',
                    'quantity' => 2,
                ],
                $game->id => [
                    'type' => 'game',
                    'quantity' => 1,
                ],
            ],
        ]);

    $response->assertRedirect(route('checkout.view'));
    $response->assertSessionHas('success', 'Order placed successfully.');

    $this->assertDatabaseCount('orders', 1);
    $this->assertDatabaseCount('order_details', 2);

    $order = Order::first();
    $this->assertEquals('John', $order->firstname);
    $this->assertEquals('Doe', $order->lastname);
    $this->assertEquals('1234567890', $order->mobile);
    $this->assertEquals('john@example.com', $order->email);
    $this->assertEquals('123 Street', $order->line1);
    $this->assertEquals('Apt 4B', $order->line2);
    $this->assertEquals('New York', $order->city);
    $this->assertEquals('12345', $order->postalcode);

    $orderDetails = OrderDetail::where('order_id', $order->id)->get();
    $this->assertCount(2, $orderDetails);

    $productOrderDetail = $orderDetails->where('order_type', 'product')->first();
    $this->assertEquals($product->image, $productOrderDetail->image);
    $this->assertEquals($product->id, $productOrderDetail->product_id);
    $this->assertEquals($product->name, $productOrderDetail->product_name);
    $this->assertEquals(2, $productOrderDetail->quantity);
    $this->assertEquals($product->regular_price, $productOrderDetail->product_price);
    $this->assertEquals($product->regular_price * 2, $productOrderDetail->total);

    $gameOrderDetail = $orderDetails->where('order_type', 'game')->first();
    $this->assertEquals($game->image, $gameOrderDetail->image);
    $this->assertEquals($game->id, $gameOrderDetail->product_id);
    $this->assertEquals($game->name, $gameOrderDetail->product_name);
    $this->assertEquals(1, $gameOrderDetail->quantity);
    $this->assertEquals($game->price, $gameOrderDetail->product_price);
    $this->assertEquals($game->price * 1, $gameOrderDetail->total);
});

it('can view order confirmation', function () {
    $user = User::factory()->create();
    $order = Order::factory()->create(['user_id' => $user->id]);
    $product = Product::factory()->create();
    $game = Game::factory()->create();

    session(['cart' => [
        $product->id => [
            'type' => 'product',
            'quantity' => 2,
        ],
        $game->id => [
            'type' => 'game',
            'quantity' => 1,
        ],
    ]]);

    $response = $this->actingAs($user)->get(route('checkout.confirmation'));

    $response->assertViewHas('latestOrder', $order);
    $response->assertViewHas('otherOrders');
    $response->assertViewHas('products');
    $response->assertViewHas('allProducts');
    $response->assertViewHas('allGames');
});

it('can view orders', function () {
    $user = User::factory()->create();
    $orders = Order::factory()->count(5)->create(['user_id' => $user->id]);
    $products = Product::factory()->count(10)->create();

    $response = $this->actingAs($user)->get(route('checkout.orders'));

    $response->assertViewHas('orders', $orders);
    $response->assertViewHas('products', $products);
});

it('can view admin orders', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $users = User::factory()->count(5)->create();
    $orders = Order::factory()->count(10)->create();

    $response = $this->actingAs($admin)->get(route('admin.orders'));

    $response->assertViewHas('orders', $orders);
    $response->assertViewHas('users', $users);
});

it('can filter admin orders by user', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $users = User::factory()->count(5)->create();
    $selectedUser = $users->random();
    $orders = Order::factory()->count(10)->create(['user_id' => $selectedUser->id]);

    $response = $this->actingAs($admin)->get(route('admin.orders', ['user' => $selectedUser->id]));

    $response->assertViewHas('orders', $orders);
    $response->assertViewHas('users', $users);
});