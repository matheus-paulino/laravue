<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Stock\StockController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::prefix('/dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/new', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/new', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{id}', [UserController::class, 'show'])->name('admin.user.show');
    });

    Route::prefix('/stock')->group(function () {
        Route::get('/', [StockController::class, 'index'])->name('admin.stock.index');
        Route::get('/new', [StockController::class, 'create'])->name('admin.stock.create');
        Route::post('/new', [StockController::class, 'store'])->name('admin.stock.store');
        Route::get('/show/{id}', [StockController::class, 'show'])->name('admin.stock.show');
    });

    Route::prefix('/products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/new', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/new', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('admin.product.show');
    });
});




require __DIR__.'/auth.php';