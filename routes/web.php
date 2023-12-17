<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('addProducts');
})->name('home');

Route::post('/store', [ProductController::class, 'store'])->name('store');
Route::post('/update', [ProductController::class, 'update'])->name('update');
Route::post('/sell', [ProductController::class, 'sellProduct'])->name('sell');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/edit', [ProductController::class, 'edit'])->name('edit');
Route::get('/sales', [ProductController::class, 'showSales'])->name('sales');
Route::get('/dashboard', [ProductController::class, 'showDashboard'])->name('dashboard');
