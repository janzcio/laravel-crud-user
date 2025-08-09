<?php

use App\Http\Controllers\api\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::post('/login', [UserController::class, 'login']);

// Protected Routes (Requires Authentication)
Route::group(['middleware' => 'auth:sanctum'], function () {
    // User Management Routes
    Route::get('/users', [UserController::class, 'index']);           // Get all users
    Route::post('/users', [UserController::class, 'store']);          // Create a new user
    Route::get('/users/{id}', [UserController::class, 'show']);       // Get a specific user by ID
    Route::put('/users/{id}', [UserController::class, 'update']);     // Update a specific user
    Route::delete('/users/{id}', [UserController::class, 'destroy']); // Delete a specific user
});
