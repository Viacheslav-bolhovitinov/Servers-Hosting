<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index()
    {
        $servers = [
            [
                'id' => 1,
                'name' => 'Minecraft SkyBlock',
                'game' => 'Minecraft',
                'slots' => 20,
                'price' => 150,
                'status' => 'Доступний',
            ],
            [
                'id' => 2,
                'name' => 'CS2 Competitive',
                'game' => 'Counter-Strike 2',
                'slots' => 10,
                'price' => 200,
                'status' => 'Зайнятий',
            ],
            [
                'id' => 3,
                'name' => 'Rust Survival',
                'game' => 'Rust',
                'slots' => 50,
                'price' => 300,
                'status' => 'Доступний',
            ],
            [
                'id' => 4,
                'name' => 'Valheim Vikings',
                'game' => 'Valheim',
                'slots' => 10,
                'price' => 120,
                'status' => 'Доступний',
            ],
        ];

        return view('servers.index', ['servers' => $servers]);
    }

    public function show($id)
    {
        $servers = [
            1 => [
                'id' => 1,
                'name' => 'Minecraft SkyBlock',
                'game' => 'Minecraft',
                'slots' => 20,
                'price' => 150,
                'status' => 'Доступний',
                'description' => 'Класичний SkyBlock сервер з активною спільнотою. Підтримує версії 1.19-1.20.',
            ],
            2 => [
                'id' => 2,
                'name' => 'CS2 Competitive',
                'game' => 'Counter-Strike 2',
                'slots' => 10,
                'price' => 200,
                'status' => 'Зайнятий',
                'description' => 'Приватний сервер для змагальних матчів 5v5. Tickrate 128.',
            ],
            3 => [
                'id' => 3,
                'name' => 'Rust Survival',
                'game' => 'Rust',
                'slots' => 50,
                'price' => 300,
                'status' => 'Доступний',
                'description' => 'Виживання у відкритому світі. Щотижневий вайп карти.',
            ],
            4 => [
                'id' => 4,
                'name' => 'Valheim Vikings',
                'game' => 'Valheim',
                'slots' => 10,
                'price' => 120,
                'status' => 'Доступний',
                'description' => 'Кооперативне виживання у світі вікінгів. Встановлені популярні моди.',
            ],
        ];

        $server = $servers[$id] ?? null;

        if (!$server) {
            return redirect('/servers')->with('error', 'Сервер не знайдено');
        }

        return view('servers.show', ['server' => $server]);
    }
}