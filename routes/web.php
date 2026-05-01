<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\Admin\ServerController as AdminServerController;
use App\Models\Server;

Route::get('/', [MainController::class, 'index']);

Route::get('/about', [MainController::class, 'about']);

Route::get('/servers', [ServerController::class, 'index']);

Route::get('/servers/{id}', [ServerController::class, 'show'])->name('servers.show');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('servers', AdminServerController::class)
        ->only(['index', 'show', 'destroy', 'create', 'store', 'edit', 'update']);
});

require __DIR__.'/auth.php';