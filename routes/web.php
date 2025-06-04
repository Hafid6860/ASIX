<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kirim-pesan', [MessageController::class, 'create'])->name('message.create');
Route::post('/kirim-pesan', [MessageController::class, 'store'])->name('message.store');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes (hanya untuk user yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/message/{message}', [DashboardController::class, 'show'])->name('dashboard.show');
    Route::post('/dashboard/message/{message}/reply', [DashboardController::class, 'reply'])->name('dashboard.reply');
});
