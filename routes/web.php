<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;


use App\View\Components\DetailsComponent;
use App\View\Components\CategoryComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserManagementController;
use App\View\Components\admin\AdminAddCategoryComponent;
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

//common routes
Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home')->middleware('verified');
Route::get('/about-us',[HomeController::class, 'aboutUs'])->middleware('auth')->name('about-us')->middleware('verified');
Route::get('/contact-us',[HomeController::class, 'contactUs'])->middleware('auth')->name('contact-us')->middleware('verified');


//shop routes
Route::get('/shop',[ShopComponent::class, 'render'])->middleware('auth')->name('shop')->middleware('verified');
Route::get('/search',[ShopComponent::class, 'search'])->middleware('auth')->name('search')->middleware('verified');
Route::get('/product/{slug}',[DetailsComponent::class, 'details'])->middleware('auth')->name('product.details')->middleware('verified');
Route::get('/cart',[ComponentsCartComponent::class, 'cart'])->middleware('auth')->name('shop.cart')->middleware('verified');
Route::get('/add-to-cart/{id}',[ShopComponent::class, 'addToCart'])->middleware('auth')->name('add_to_cart')->middleware('verified');
Route::patch('/update-cart',[ShopComponent::class, 'update'])->middleware('auth')->name('update_cart')->middleware('verified');
Route::delete('/remove-from-cart',[ShopComponent::class, 'remove'])->middleware('auth')->name('remove_from_cart')->middleware('verified');
Route::delete('/clear-cart',[ShopComponent::class, 'clear'])->middleware('auth')->name('clear_cart')->middleware('verified');
// Route::get('/checkout',[ComponentsCheckoutComponent::class, 'checkout'])->middleware('auth')->name('shop.checkout')->middleware('verified');
Route::get('/product-category/{slug}',[CategoryComponent::class, 'category'])->middleware('auth')->name('product.category')->middleware('verified');


//admin routes 
Route::get('/admin/categories',[AdminCategoryComponent::class, 'render'])->middleware('auth')->middleware('admin')->name('admin.categories')->middleware('verified');
Route::get('/admin/category/add',[AdminAddCategoryComponent::class, 'render'])->middleware('auth')->middleware('admin')->name('admin.category.add')->middleware('verified');
Route::get('/admin.products',[ShopComponent::class, 'render'])->middleware('auth')->middleware('admin')->name('admin.shop')->middleware('verified');
Route::get('/admin.products/{slug}',[DetailsComponent::class, 'details'])->middleware('auth')->middleware('admin')->name('admin.product.details')->middleware('verified');
Route::get('/admin.product-category/{slug}',[CategoryComponent::class, 'category'])->middleware('auth')->middleware('admin')->name('admin.product.category')->middleware('verified');


// admin category routes
 Route::controller(CategoryController::class)->prefix('admin')->group(function(){
    Route::get('/categories','index')->middleware('auth')->middleware('admin')->name('category')->middleware('verified');
    Route::get('/category-create','create')->middleware('auth')->middleware('admin')->name('category.create')->middleware('verified');
    Route::post('/category-store','store')->middleware('auth')->middleware('admin')->name('category.store')->middleware('verified');
    Route::get('/category-edit/{id}','edit')->middleware('auth')->middleware('admin')->name('category.edit')->middleware('verified');
    Route::put('/category-edit/{id}','update')->middleware('auth')->middleware('admin')->name('category.update')->middleware('verified');
    Route::delete('/category-destroy/{id}','destroy')->middleware('auth')->middleware('admin')->name('category.destroy')->middleware('verified');
 });
 

// user management routes
Route::controller(UserManagementController::class)->prefix('admin')->group(function(){
    Route::get('/users','index')->middleware('auth')->middleware('admin')->name('users')->middleware('verified');
    Route::get('/user-create','create')->middleware('auth')->middleware('admin')->name('user.create')->middleware('verified');
    Route::post('/user-store','store')->middleware('auth')->middleware('admin')->name('user.store')->middleware('verified');
    Route::get('/user-edit/{id}','edit')->middleware('auth')->middleware('admin')->name('user.edit')->middleware('verified');
    Route::put('/user-edit/{id}','update')->middleware('auth')->middleware('admin')->name('user.update')->middleware('verified');
    Route::delete('/user-destroy/{id}','destroy')->middleware('auth')->middleware('admin')->name('user.destroy')->middleware('verified');
 });
 

 // product routes
 Route::controller(ProductController::class)->prefix('admin')->group(function(){
    Route::get('/products','index')->middleware('auth')->middleware('admin')->name('products')->middleware('verified');
    Route::get('/product-create','create')->middleware('auth')->middleware('admin')->name('product.create')->middleware('verified');
    Route::post('/product-store','store')->middleware('auth')->middleware('admin')->name('product.store')->middleware('verified');
    Route::get('/product-edit/{id}','edit')->middleware('auth')->middleware('admin')->name('product.edit')->middleware('verified');
    Route::put('/product-edit/{id}','update')->middleware('auth')->middleware('admin')->name('product.update')->middleware('verified');
    Route::delete('/product-destroy/{id}','destroy')->middleware('auth')->middleware('admin')->name('product.destroy')->middleware('verified');
 });
 
// checkout routes
Route::get('/checkout',[StripeController::class, 'index'])->middleware('auth')->name('checkout')->middleware('verified');
Route::post('/checkout/store',[OrderController::class, 'store'])->middleware('auth')->name('checkout.store')->middleware('verified');
Route::get('/checkout/view',[OrderController::class, 'index'])->middleware('auth')->name('checkout.view')->middleware('verified');
Route::post('/checkout/process', [StripeController::class, 'checkout'])
    ->middleware(['auth', 'verified'])
    ->name('checkout.process');
Route::get('/checkout/success',[StripeController::class, 'success'])->middleware('auth')->name('checkout.success')->middleware('verified');
Route::get('/chekout/orders',[OrderController::class, 'view'])->middleware('auth')->name('checkout.orders')->middleware('verified');


//profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';