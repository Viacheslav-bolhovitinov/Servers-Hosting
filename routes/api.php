<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Session\Middleware\StartSession;
use App\Http\Controllers\Api\GameServerController;

Route::middleware([StartSession::class])->group(function () {
    Route::get('/servers', [GameServerController::class, 'index']);
    Route::get('/servers/{id}', [GameServerController::class, 'show']);
    Route::post('/servers/store', [GameServerController::class, 'store']);
    Route::put('/servers/{id}', [GameServerController::class, 'update']);
    Route::delete('/servers/{id}', [GameServerController::class, 'destroy']);

    Route::get('/games', function () {
        $games = \App\Models\Server::select('game')
            ->distinct()
            ->orderBy('game')
            ->pluck('game');

        return response()->json($games);
    });

    Route::get('/categories', function () {
        $categories = \App\Models\Server::select('game')
            ->distinct()
            ->orderBy('game')
            ->pluck('game');

        return response()->json($categories);
    });
});
