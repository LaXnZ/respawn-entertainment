<?php

use App\Http\Controllers\ProfileController;


use App\View\Components\DetailsComponent;
use App\View\Components\CategoryComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\View\Components\admin\AdminCategoryComponent;
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

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);


Auth::routes(
    [
        'verify' => true
    ]
);


Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home')->middleware('verified');


//shop routes
Route::get('/shop',[ShopComponent::class, 'render'])->middleware('auth')->name('shop')->middleware('verified');
Route::get('/product/{slug}',[DetailsComponent::class, 'details'])->middleware('auth')->name('product.details')->middleware('verified');
Route::get('/cart',[ComponentsCartComponent::class, 'cart'])->middleware('auth')->name('shop.cart')->middleware('verified');
Route::get('/add-to-cart/{id}',[ShopComponent::class, 'addToCart'])->middleware('auth')->name('add_to_cart')->middleware('verified');
Route::patch('/update-cart',[ShopComponent::class, 'update'])->middleware('auth')->name('update_cart')->middleware('verified');
Route::delete('/remove-from-cart',[ShopComponent::class, 'remove'])->middleware('auth')->name('remove_from_cart')->middleware('verified');
Route::get('/checkout',[ComponentsCheckoutComponent::class, 'checkout'])->middleware('auth')->name('shop.checkout')->middleware('verified');
Route::get('/product-category/{slug}',[CategoryComponent::class, 'category'])->middleware('auth')->name('product.category')->middleware('verified');


//admin routes 
Route::get('/admin/categories',[AdminCategoryComponent::class, 'render'])->middleware('auth')->middleware('admin')->name('admin.categories')->middleware('verified');

//profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
