<?php

require base_path('routes/auth.php');

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');

    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile', 'edit')->middleware('password.confirm', 'verified')->name('profile.edit');
        Route::patch('/profile', 'updateInfo')->name('profile.info');
        Route::put('/profile', 'updatePassword')->name('profile.password');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
