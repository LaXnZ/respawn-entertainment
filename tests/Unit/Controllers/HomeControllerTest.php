<?php

use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Appointment;
use App\Models\Game;
use App\Models\OrderDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

uses(RefreshDatabase::class);

it('should return the correct view for index method when user is an admin', function () {
    $user = User::factory()->create(['usertype' => 'admin']);
    Auth::shouldReceive('id')->andReturn($user->id);
    $products = Product::factory()->count(5)->create();
    $categories = Category::factory()->count(5)->create();
    $users = User::factory()->count(5)->create();
    $orders = Order::factory()->count(5)->create();
    $reservations = Appointment::factory()->count(5)->create();
    $games = Game::factory()->count(5)->create();
    $popularProducts = Product::factory()->count(5)->create(['views' => 10])->sortByDesc('views')->take(5);
    $mostOrderedProducts = Product::factory()->count(5)->create();
    $mostPricedProducts = Product::factory()->count(5)->create(['regular_price' => 100])->sortByDesc('regular_price')->take(5);
    $popularGames = Game::factory()->count(5)->create(['views' => 10])->sortByDesc('views')->take(5);
    $mostOrderedGames = Game::factory()->count(5)->create();
    $mostPricedGames = Game::factory()->count(5)->create(['price' => 100])->sortByDesc('price')->take(5);
    $totalSales = OrderDetail::factory()->count(5)->create(['total' => 100])->sum('total');
    $currentMonthOrders = OrderDetail::factory()->count(5)->create(['created_at' => now()])->whereYear('created_at', '=', now()->year)
        ->whereMonth('created_at', '=', now()->month);
    $currentMonthSales = OrderDetail::factory()->count(5)->create(['created_at' => now()])->whereYear('created_at', '=', now()->year)
        ->whereMonth('created_at', '=', now()->month)->sum('total');
    $lastMonthOrders = OrderDetail::factory()->count(5)->create(['created_at' => now()->subMonth()])->whereYear('created_at', '=', now()->subMonth()->year)
        ->whereMonth('created_at', '=', now()->subMonth()->month);

    $response = (new HomeController())->index();

    $response->assertViewIs('admin/admin_dashboard')
        ->assertViewHas('products', $products)
        ->assertViewHas('categories', $categories)
        ->assertViewHas('users', $users)
        ->assertViewHas('orders', $orders)
        ->assertViewHas('reservations', $reservations)
        ->assertViewHas('games', $games)
        ->assertViewHas('popularProducts', $popularProducts)
        ->assertViewHas('mostOrderedProducts', $mostOrderedProducts)
        ->assertViewHas('mostPricedProducts', $mostPricedProducts)
        ->assertViewHas('popularGames', $popularGames)
        ->assertViewHas('mostOrderedGames', $mostOrderedGames)
        ->assertViewHas('mostPricedGames', $mostPricedGames)
        ->assertViewHas('totalSales', $totalSales)
        ->assertViewHas('currentMonthOrders', $currentMonthOrders)
        ->assertViewHas('lastMonthOrders', $lastMonthOrders)
        ->assertViewHas('currentMonthSales', $currentMonthSales);
});

it('should return the correct view for aboutUs method when user is an admin', function () {
    $user = User::factory()->create(['usertype' => 'admin']);
    Auth::shouldReceive('id')->andReturn($user->id);

    $response = (new HomeController())->aboutUs();

    $response->assertViewIs('components/about-us');
});

it('should return the correct view for contactUs method when user is an admin', function () {
    $user = User::factory()->create(['usertype' => 'admin']);
    Auth::shouldReceive('id')->andReturn($user->id);

    $response = (new HomeController())->contactUs();

    $response->assertViewIs('components/contact-us');
});