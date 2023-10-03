<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\CartComponent;
use App\Livewire\CheckoutComponent;
use App\View\Components\CartComponent as ComponentsCartComponent;
use App\View\Components\CheckoutComponent as ComponentsCheckoutComponent;
use App\View\Components\ShopComponent as ShopComponent;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes(
    [
        'verify' => true
    ]
);


Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home')->middleware('verified');


//shop routes
Route::get('/shop',[ShopComponent::class, 'shop'])->middleware('auth')->name('shop')->middleware('verified');
Route::get('/cart',[ComponentsCartComponent::class, 'cart'])->middleware('auth')->name('shop.cart')->middleware('verified');
Route::get('/checkout',[ComponentsCheckoutComponent::class, 'checkout'])->middleware('auth')->name('shop.checkout')->middleware('verified');



//admin routes (admin middleware -> middleware(['auth','admin'])

//profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
