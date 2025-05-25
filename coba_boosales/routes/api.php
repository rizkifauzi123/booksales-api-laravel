<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;   
use App\Http\Controllers\BookController;


Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/books', [BookController::class, 'index']);