<?php

use App\Http\Controllers\ProfileController;
use App\Models\History;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin/admin-welcome');
});

Route::middleware('auth:admins')->group(function () {

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

    //管理者product
    Route::get('/product', [AdminProductController::class,'index'])->name('product.index');
    Route::post('/product', [AdminProductController::class,'store'])->name('product.store');
    Route::get('/product/create', [AdminProductController::class, 'create'])->name('product.create');
    Route::get('/product/{id}/show',[AdminProductController::class,'show'])->name('product.show');
    Route::get('/product/{id}/edit', [AdminProductController::class,'edit'])->name('product.edit');
    Route::post('/product/{id}',[AdminProductController::class,'update'])->name('product.update');
    Route::delete('/product/{id}', [AdminProductController::class,'destroy'])->name('product.destroy');
});

require __DIR__.'/adminAuth.php';
