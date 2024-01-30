<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('users', \App\Http\Controllers\Api\UserController::class)->except(['index', 'create', 'show', 'edit']);
Route::resource('cars', \App\Http\Controllers\Api\CarController::class)->except(['create', 'show', 'edit']);
