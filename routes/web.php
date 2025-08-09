<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\UserController;
use App\Http\Controllers\web\DashboardController;

// Authentication Routes
Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Protected Routes (Requires Authentication)
Route::group(['middleware' => 'auth:sanctum'], function () {
   Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
