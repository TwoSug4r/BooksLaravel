<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//main routes
Route::get('/', function () {
    return view('welcome');
});


//users routes
Route::get('/users', [UserController::class, 'index']);


//books routes
Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/books/add', [BookController::class, 'create']);
Route::post('/books', [BookController::class, 'store']); //POST для редиректа под добавление
Route::get('/books/{id}/edit', [BookController::class, 'edit']);
Route::put('/books/{id}', [BookController::class, 'update']);
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

