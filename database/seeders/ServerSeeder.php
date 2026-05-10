<?php

namespace Database\Seeders;

use App\Models\Server;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Server::insert([
            [
                'name' => 'CS2 Competitive',
                'game' => 'CS2',
                'ip' => '94.23.34.12',
                'status' => 'active',
                'slots' => 10,
                'price' => '200 грн/год',
                'description' => 'Сервер для змагальних матчів 5v5.',
                'reserved_by' => 'Олександр',
                'reserved_until' => '2026-04-10 18:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rust Survival',
                'game' => 'Rust',
                'ip' => '45.79.20.55',
                'status' => 'active',
                'slots' => 50,
                'price' => '300 грн/год',
                'description' => 'Виживання у відкритому світі.',
                'reserved_by' => 'Марія',
                'reserved_until' => '2026-04-12 21:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Minecraft SkyBlock',
                'game' => 'Minecraft',
                'ip' => '178.62.45.101',
                'status' => 'off',
                'slots' => 20,
                'price' => '150 грн/год',
                'description' => 'Класичний SkyBlock сервер.',
                'reserved_by' => null,
                'reserved_until' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Valheim Vikings',
                'game' => 'Valheim',
                'ip' => '91.108.4.22',
                'status' => 'active',
                'slots' => 16,
                'price' => '180 грн/год',
                'description' => 'Скандинавське виживання для справжніх вікінгів.',
                'reserved_by' => null,
                'reserved_until' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
