<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\JabatanController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('/dashboard', function () {
        return view('users.dashboard');
    })->middleware(['auth', 'verified'])->name('users.dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/users/dashboard', [UserDashboardController::class, 'index'])->name('users.dashboard');
        Route::get('/profile', [UserDashboardController::class, 'profile'])->name('users.profile');
        Route::get('/users/edit', [UserDashboardController::class, 'edit'])->name('users.edit');
        Route::put('/profile', [UserDashboardController::class, 'update'])->name('users.profile.update');

        Route::get('/profile/keluarga', [UserDashboardController::class, 'keluarga'])->name('user.profile.keluarga');
        Route::put('/profile/keluarga', [UserDashboardController::class, 'updateKeluarga'])->name('user.profile.keluarga.update');
        Route::post('/profile/keluarga', [UserDashboardController::class, 'updateKeluarga']);
    
        Route::resource('departements', DepartementController::class);


    });
    Route::middleware(['auth', AdminMiddleware::class])->group(function () {
        
    });
    Route::middleware(['auth', 'admin'])->group(function(){
        Route::resource('plant', PlantController::class);
        
        Route::resource('jabatan', JabatanController::class);  

        Route::get('/admin/users', [AdminDashboardController::class, 'index'])->name('admin.users.index');

        Route::get('/admin', function(){return view('admin.dashboard');})->name('admin.dashboard'); // dashboard admin
       
        Route::get('/admin/profile', [AdminDashboardController::class, 'profile'])->name('admin.profile'); //admin profile
        Route::get('/admin/users/edit/{user:npk}', [AdminDashboardController::class, 'edit'])->name('admin.users.edit'); //admin edit user
        Route::put('/admin/profile/{user:npk}', [AdminDashboardController::class, 'update'])->name('admin.profile.update'); //admin update profile
        Route::get('/admin/register', [AdminDashboardController::class, 'create'])->name('admin.register'); //admin create user
        Route::post('/admin/register', [AdminDashboardController::class, 'store'])->name('admin.register'); //admin store user
        
        // Route::delete('/users{npk}', [AdminDashboardController::class, 'destroy'])->name('users.destroy');
    });


    require __DIR__.'/auth.php';
