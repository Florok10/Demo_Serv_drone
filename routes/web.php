<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Product Routes */

    Route::get('/products/product-detail/{id}', [ProductController::class, 'show'])->whereNumber('id')->name('product-detail');

    Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

/*******************************************/


/* Cart Routes */

    Route::get('/my-shopping-cart', [CartController::class, 'index'])->name('my-cart');

    Route::post('/products/product-detail', [CartController::class, 'store'])
    ->name('cart.store');

/********************/


// Route::get('/profil', function()
// {
//     return view('pages/index');
// });



/* Contact Routes */

    Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');

    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*********************/

Route::get('/', function () {
    return view('pages/index');
})->name('home');

    Route::get('/drones-history', function()
    {
        return view('pages.drones-history');
    })->name('history');

/* Order History Routes */

    Route::get('/my-history', [OrderHistoryController::class, 'show'])->name('my-history');

/****************************/


/* Profil info routes */

    Route::post('/user/profile/', [UserInfoController::class, 'updatePhones'])->name('updatePhones');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['admin'])->group(function () {
    Route::get('/panel-admin', function()
    {
        return view('admin/panel-admin');
    })->name('panel-admin');

    /* Event */
    Route::get('/add-event', [EventController::class, 'create'])->name('event.create');
    Route::post('/add-event', [EventController::class, 'store'])->name('event.store');
    Route::get('/edit-event/{id}', [EventController::class, 'update'])->whereNumber('id');

    /* Product */

    Route::get('/add-product', [ProductController::class, 'create']);

    Route::post('/add-product', [ProductController::class, 'store'])->name('product-store');

    Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->whereNumber('id');

    Route::post('/product-edit', [ProductController::class, 'update'])->name('product-edit');

    Route::delete('/product-delete/{id}', [ProductController::class, 'destroy'])->whereNumber('id');

});

Route::middleware(['authentificate'])->group(function()
{
    Route::get('/order', [OrderController::class, 'create']);

    Route::post('/order', [OrderController::class, 'store']);
});

/* Event */
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/event-detail/{id}', [EventController::class, 'show'])->whereNumber('id')->name('event-detail');
