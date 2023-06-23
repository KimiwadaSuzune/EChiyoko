<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PayController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//商品購入関連
Route::post('pay/checkout', [PayController::class, 'index'])->name('pay.index');
Route::post('pay/checkout', [PayController::class, 'store'])->name('pay.store');
Route::post('pay/success', [PayController::class, 'success'])->name('pay.success');

require __DIR__.'/auth.php';

//kimiwada
Route::post('product/index', [ProductController::class, 'index'])->name('product.index');
Route::post('product/show', [ProductController::class, 'index'])->name('product.show');
Route::post('history/index', [HistoryController::class, 'index'])->name('history.index');
