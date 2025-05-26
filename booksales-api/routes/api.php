<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;   
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;


Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

// Route::get('/authors', [AuthorController::class, 'index']);
// Route::post('/authors', [AuthorController::class, 'store']);
// Route::get('/books', [BookController::class, 'index']);
// Route::get('/genres', [GenreController::class, 'index']);
// Route::post('/genres', [GenreController::class, 'store']);

Route::apiResource('authors', AuthorController::class);
Route::apiResource('genres', GenreController::class);