<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ServerController;

Route::get('/', [MainController::class, 'index']);

Route::get('/about', [MainController::class, 'about']);

Route::get('/servers', [ServerController::class, 'index']);

Route::get('/servers/{id}', [ServerController::class, 'show']);