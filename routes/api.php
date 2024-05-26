<?php

use App\Http\Controllers\Api\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UsersController::class, 'getAll']);
Route::post('/users', [UsersController::class, 'insert']);
Route::get('/users/{id}', [UsersController::class, 'getOne']);
Route::put('/users/{id}', [UsersController::class, 'update'])->name('user-update');
Route::delete('/users/{id}', [UsersController::class, 'delete']);
