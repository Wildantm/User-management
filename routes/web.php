<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth'])->group(function () {
    Route::resource('/jabatan', JabatanController::class);
    Route::resource('/plant', PlantController::class);
    Route::resource('/departements', DepartementController::class);
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

require __DIR__.'/auth.php';
