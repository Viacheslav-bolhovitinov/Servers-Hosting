<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\Admin\ServerController as AdminServerController;
use App\Models\Server;

Route::get('/', [MainController::class, 'index']);

Route::get('/about', [MainController::class, 'about']);

Route::get('/servers', [ServerController::class, 'index']);

Route::get('/servers/{id}', [ServerController::class, 'show']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::bind('server', function ($value) {
        $deleted = request()->session()->get('deleted_servers', []);
        return Server::find((int) $value, $deleted);
    });

    Route::resource('servers', AdminServerController::class)
        ->only(['index', 'show', 'destroy']);
});