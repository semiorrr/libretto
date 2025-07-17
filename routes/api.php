<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Use API controllers for resource routes
    Route::apiResource('books', App\Http\Controllers\API\BookController::class);
    Route::apiResource('authors', App\Http\Controllers\API\AuthorController::class);
    Route::apiResource('genres', App\Http\Controllers\API\GenreController::class);
    Route::apiResource('reviews', App\Http\Controllers\API\ReviewController::class);

    // Add more protected routes as needed
});
