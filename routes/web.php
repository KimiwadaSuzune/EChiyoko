<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HistoryController;
use App\Models\History;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:users')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//商品購入関連
Route::get('pay/checkout', [PayController::class, 'index'])->name('pay.checkout');
Route::post('pay/checkout', [PayController::class, 'store'])->name('pay.store');
Route::get('pay/success', [PayController::class, 'success'])->name('pay.success');

require __DIR__.'/auth.php';

//kimiwada
Route::get('product/index', [ProductController::class, 'index'])->name('product.index');
Route::get('product/show', [ProductController::class, 'index'])->name('product.show');
Route::get('history/index', [HistoryController::class, 'index'])->name('history.index');
