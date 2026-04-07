<?php

namespace App\Models;

class Server
{
    public int $id;
    public string $name;
    public string $game;
    public string $ip;
    public string $status;
    public int $slots;
    public ?string $price;
    public ?string $description;
    public ?string $reserved_by;
    public ?string $reserved_until;

    private static array $data = [
        1 => [
            'id' => 1,
            'name' => 'CS2 Competitive',
            'game' => 'CS2',
            'ip' => '94.23.34.12',
            'status' => 'active',
            'slots' => 10,
            'price' => '200 грн/год',
            'description' => 'Сервер для змагальних матчів 5v5 з високою якістю роботи.',
            'reserved_by' => 'Олександр',
            'reserved_until' => '2026-04-10 18:00',
        ],
        2 => [
            'id' => 2,
            'name' => 'Rust Survival',
            'game' => 'Rust',
            'ip' => '45.79.20.55',
            'status' => 'active',
            'slots' => 50,
            'price' => '300 грн/год',
            'description' => 'Виживання у відкритому світі з дружньою спільнотою.',
            'reserved_by' => 'Марія',
            'reserved_until' => '2026-04-12 21:00',
        ],
        3 => [
            'id' => 3,
            'name' => 'Minecraft SkyBlock',
            'game' => 'Minecraft',
            'ip' => '178.62.45.101',
            'status' => 'off',
            'slots' => 20,
            'price' => '150 грн/год',
            'description' => 'Класичний SkyBlock сервер з активною спільнотою.',
            'reserved_by' => null,
            'reserved_until' => null,
        ],
    ];

    public function __construct(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function getRouteKey()
    {
        return $this->id;
    }

    public function getRouteKeyName(): string
    {
        return 'id';
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }

    public static function all(array $excludeIds = []): array
    {
        return array_values(array_map(function (array $item) {
            return new self($item);
        }, array_filter(self::$data, function (array $item) use ($excludeIds) {
            return !in_array($item['id'], $excludeIds, true);
        })));
    }

    public static function find(int $id, array $excludeIds = []): ?self
    {
        if (in_array($id, $excludeIds, true)) {
            return null;
        }

        return isset(self::$data[$id]) ? new self(self::$data[$id]) : null;
    }
}
