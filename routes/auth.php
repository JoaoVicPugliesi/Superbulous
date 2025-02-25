<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\EmailController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {

    // Register Routes

    Route::controller(RegisterController::class)->group(function() {
        Route::get('/register', 'create')->name('register');
        Route::post('/register', 'store');
    });

    // Login Routes

    Route::controller(SessionController::class)->group(function() {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store');
    });

    Route::controller(ResetPasswordController::class)->group(function() {

         // Request Password Routes

        Route::get('/forgot-password', 'request')->name('password.request');

        Route::post('/forgot-password', 'email')->name('password.email');

        // Reset Password Routes

        Route::get('/reset-password/{token}', 'reset')->name('password.reset');

        Route::post('/reset-password', 'update')->name('password.update');
    });
});

    Route::middleware('auth')->group(function() {

    // Logout Route

    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

    // Email Verification Routes
    
    Route::controller(EmailController::class)->group(function () {
        Route::get('/email/verify', 'notice')->name('verification.notice');
        Route::post('/email/verify', 'verify')->name('verification.verify');
        Route::post('/email/verification-notification', 'send')->name('verification.send');
    });

    Route::controller(ConfirmPasswordController::class)->group(function() {
        Route::get('/confirm-password', 'create')->name('password.confirm');

        Route::post('/confirm-password', 'store')->middleware('throttle:6,1');
    });
});

