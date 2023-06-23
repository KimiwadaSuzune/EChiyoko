<?php

use App\Http\Controllers\ProfileController;
use App\Models\History;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin/admin-welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:admins', 'verified'])->name('dashboard');

Route::middleware('auth:admins')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/adminAuth.php';
