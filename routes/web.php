<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProgressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoadmapController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/skills', [HomeController::class, 'skills'])->name('skills.index');
Route::get('/skills/{skill:slug}', [HomeController::class, 'show'])->name('skills.show');
Route::get('/skills/{skill:slug}/lessons/{lesson:slug}', [HomeController::class, 'lesson'])->name('lessons.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])
    ->name('password.request');

    Route::post('/forgot-password', [AuthController::class, 'sendOtp'])
    ->middleware('throttle:3,1')
    ->name('password.email');

    Route::get('/verify-otp', [AuthController::class, 'showVerifyOtp'])
    ->name('password.otp');

    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])
    ->middleware('throttle:10,1')
    ->name('password.otp.verify');

    Route::get('/reset-password', [AuthController::class, 'showResetPassword'])
    ->name('password.reset');

    Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->name('password.update');

});

    Route::post('/logout', [AuthController::class, 'logout'])
        ->middleware('auth')
        ->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth')
        ->name('dashboard');
    
    Route::get('/roadmap', [RoadmapController::class, 'index'])
    ->middleware('auth')
    ->name('roadmap');

    Route::post('/skills/{skill:slug}/lessons/{lesson:slug}/complete', [ProgressController::class, 'complete'])
        ->middleware('auth')
        ->name('lessons.complete');
    
    Route::get('/tentang', function () {
    return view('about');
    })->name('about');