<?php

use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\BackEnd\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Pages
Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/menu', [HomepageController::class, 'menu'])->name('menu');
Route::get('/product-detail/{id}', [HomepageController::class, 'single'])->name('single.product');
Route::get('/services', [HomepageController::class, 'services'])->name('services');
Route::get('/blog', [HomepageController::class, 'blog'])->name('blog');
Route::get('/about', [HomepageController::class, 'about'])->name('about');
Route::get('/contact', [HomepageController::class, 'contact'])->name('contact');

Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin'], function () {
    // Admin Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Categories
    Route::get('categories/data', [CategoryController::class, 'data'])->name('categories.data');
    Route::resource('categories', CategoryController::class);

    // Admin Products
    Route::get('products/data', [ProductController::class, 'data'])->name('products.data');
    Route::resource('products', ProductController::class);

    // Admin Orders
    Route::get('orders/data', [OrderController::class, 'data'])->name('orders.data');
    Route::resource('orders', OrderController::class);
    Route::post('orders/{id}/status-delivered', [OrderController::class, 'delivered'])->name('status.delivered');
    Route::post('orders/{id}/status-success', [OrderController::class, 'success'])->name('status.success');

    // Admin Bookings
    Route::get('bookings/data', [BookingController::class, 'data'])->name('bookings.data');
    Route::resource('bookings', BookingController::class);
});

Route::middleware('auth')->group(function () {
    // Booking
    Route::post('/book-table', [HomepageController::class, 'bookTable'])->name('book.table');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cart
    Route::post('/product{id}', [CartController::class, 'addCart'])->name('add.cart');
    Route::get('/cart', [CartController::class, 'cart'])->name('show.cart');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('remove.item');

    // Checkout
    Route::post('/prepare-checkout', [CartController::class, 'prepareCheckout'])->name('prepare.checkout');
    Route::get('/checkout', [CartController::class, 'cartCheckout'])->name('cart.checkout')->middleware('check');
    Route::post('/proccess-checkout', [CartController::class, 'proccessCheckout'])->name('proccess.checkout');
    Route::get('/payment', [CartController::class, 'payment'])->name('payment')->middleware('check');
    Route::get('/payment/success', [CartController::class, 'success'])->name('success')->middleware('check');

    // User
    Route::get('/my-order', [UserController::class, 'myOrder'])->name('my.order');
    Route::get('/my-book', [UserController::class, 'myBook'])->name('my.book');
    Route::get('/review', [UserController::class, 'createReview'])->name('create.review');
    Route::post('/review', [UserController::class, 'storeReview'])->name('store.review');
    Route::get('/my-review', [UserController::class, 'myReview'])->name('my.review');
});

require __DIR__ . '/auth.php';
