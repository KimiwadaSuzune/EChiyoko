<?php

use App\Http\Controllers\ProfileController;
use App\Models\History;
use App\Http\Controllers\CategoryController;
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
    Route::get('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

});

require __DIR__.'/adminAuth.php';
