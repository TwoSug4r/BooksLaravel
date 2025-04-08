<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//users routes
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/register', [UserController::class, 'register']);
Route::post('/users', [UserController::class, 'store'])->name('user.register');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//books routes
Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/books/add', [BookController::class, 'create']);
Route::post('/books', [BookController::class, 'store']); //POST для редиректа под добавление
Route::get('/books/{id}/edit', [BookController::class, 'edit']);
Route::put('/books/{id}', [BookController::class, 'update']);
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

