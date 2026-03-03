<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/orders', [PublicController::class, 'orders'])->name('orders');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::post('/orders/quick', [OrderController::class, 'quickStore'])
    ->name('orders.quick')
    ->middleware('throttle:10,1'); // max 10 chat submissions per minute per IP
Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('lang.switch');

// Admin auth routes (no middleware)
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Admin routes (protected)
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('posts', PostController::class)->except(['show']);
    Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'update']);
    Route::post('orders/{order}/media', [AdminOrderController::class, 'storeMedia'])->name('orders.media.store');
    Route::delete('orders/{order}/media/{media}', [AdminOrderController::class, 'destroyMedia'])->name('orders.media.destroy');
});
