<?php

use App\Http\Controllers\Api\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;


Route::apiResource('books', BookController::class); //make 'index', 'show', 'store', 'update', 'destroy' methods.
Route::apiResource('users', UserController::class); //надо добавить контроллер под API,json.
