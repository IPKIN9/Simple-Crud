<?php

use App\Http\Controllers\Api\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UsersController::class, 'getAll'])->middleware('throttle:60');
Route::post('/users', [UsersController::class, 'insert'])->middleware('throttle:60');
Route::get('/users/{id}', [UsersController::class, 'getOne'])->middleware('throttle:60');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('user-update')->middleware('throttle:60');
Route::delete('/users/{id}', [UsersController::class, 'delete'])->middleware('throttle:60');
