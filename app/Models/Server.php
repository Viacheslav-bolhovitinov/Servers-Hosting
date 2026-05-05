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
    public ?float $price_per_hour;
    public ?string $description;
    public ?string $reserved_by;
    public ?string $reserved_until;

    protected static array $fillable = ['name', 'game', 'ip', 'slots', 'status', 'description', 'price', 'price_per_hour', 'reserved_by', 'reserved_until'];

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

    private static function getDeletedIds(): array
    {
        return array_map('intval', session('deleted_servers', []));
    }

    public function __construct(array $attributes = [])
    {
        $this->id = 0;
        $this->name = '';
        $this->game = '';
        $this->ip = '';
        $this->status = '';
        $this->slots = 0;
        $this->price = null;
        $this->price_per_hour = null;
        $this->description = null;
        $this->reserved_by = null;
        $this->reserved_until = null;

        foreach ($attributes as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
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
        $excludeIds = array_unique(array_merge(self::getDeletedIds(), array_map('intval', $excludeIds)));
        $data = self::getData();
        $filtered = array_filter($data, function (array $item) use ($excludeIds) {
            return !in_array($item['id'], $excludeIds, true);
        });

        return array_map(function (array $item) {
            return new self($item);
        }, $filtered);
    }

    public static function find(int $id, array $excludeIds = []): ?self
    {
        $excludeIds = array_unique(array_merge(self::getDeletedIds(), array_map('intval', $excludeIds)));

        if (in_array($id, $excludeIds, true)) {
            return null;
        }

        $data = self::getData();
        return isset($data[$id]) ? new self($data[$id]) : null;
    }

    public static function create(array $attributes): self
    {
        $data = self::getData();
        $maxId = !empty($data) ? max(array_keys($data)) : 0;
        $newId = $maxId + 1;

        $attributes['id'] = $newId;
        $attributes['reserved_by'] = $attributes['reserved_by'] ?? null;
        $attributes['reserved_until'] = $attributes['reserved_until'] ?? null;
        $attributes['price'] = $attributes['price'] ?? null;
        $attributes['price_per_hour'] = isset($attributes['price_per_hour']) ? (float) $attributes['price_per_hour'] : null;

        $data[$newId] = $attributes;
        self::saveData($data);

        return new self($attributes);
    }

    public static function update(int $id, array $attributes): ?self
    {
        $data = self::getData();

        if (!isset($data[$id]) || in_array($id, self::getDeletedIds(), true)) {
            return null;
        }

        $server = $data[$id];

        foreach ($attributes as $key => $value) {
            if (in_array($key, self::$fillable, true)) {
                if ($key === 'price_per_hour') {
                    $server[$key] = isset($value) ? (float) $value : null;
                } else {
                    $server[$key] = $value;
                }
            }
        }

        $data[$id] = $server;
        self::saveData($data);

        return new self($server);
    }

    public static function destroy(int $id): bool
    {
        $data = self::getData();

        if (!isset($data[$id]) || in_array($id, self::getDeletedIds(), true)) {
            return false;
        }

        $deleted = self::getDeletedIds();
        $deleted[] = $id;

        session(['deleted_servers' => $deleted]);
        session()->save();

        return true;
    }

    private static function getData(): array
    {
        $data = self::$data;
        $sessionData = session('servers_data', []);

        foreach ($sessionData as $id => $server) {
            $data[$id] = $server;
        }

        return $data;
    }

    private static function saveData(array $data): void
    {
        $customData = [];
        $baseIds = array_keys(self::$data);
        
        foreach ($data as $id => $server) {
            if (!in_array($id, $baseIds, true)) {
                $customData[$id] = $server;
            }
        }
        
        session(['servers_data' => $customData]);
        session()->save();
    }
}
