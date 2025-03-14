<?php

use App\Http\Controllers\Api\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/books', [BookController::class, 'index']);        // GET /api/books
Route::post('/books', [BookController::class, 'store']);       // POST /api/books
Route::get('/books/{id}', [BookController::class, 'show']);    // GET /api/books/{id}
Route::put('/books/{id}', [BookController::class, 'update']);  // PUT /api/books/{id}
Route::delete('/books/{id}', [BookController::class, 'destroy']); // DELETE /api/books/{id}