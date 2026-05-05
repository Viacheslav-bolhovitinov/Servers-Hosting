<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;

class GameServerController extends Controller
{
    public function index()
    {
        $servers = Server::all();

        return response()->json($servers);
    }

    public function show($id)
    {
        $server = Server::find((int) $id);

        if (! $server) {
            return response()->json(['message' => 'Server not found'], 404);
        }

        return response()->json($server);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'game' => 'required|string|max:255',
            'ip' => 'required|string|max:255',
            'slots' => 'required|integer|min:1',
            'price_per_hour' => 'nullable|numeric|min:0',
            'status' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'reserved_by' => 'nullable|string|max:255',
            'reserved_until' => 'nullable|date',
        ]);

        $server = Server::create($validated);

        return response()->json($server, 201);
    }

    public function update(Request $request, $id)
    {
        $server = Server::find((int) $id);

        if (! $server) {
            return response()->json(['message' => 'Server not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'game' => 'sometimes|required|string|max:255',
            'ip' => 'sometimes|required|string|max:255',
            'slots' => 'sometimes|required|integer|min:1',
            'price_per_hour' => 'sometimes|nullable|numeric|min:0',
            'status' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string',
            'reserved_by' => 'sometimes|nullable|string|max:255',
            'reserved_until' => 'sometimes|nullable|date',
        ]);

        $server = Server::update((int) $id, $validated);

        return response()->json($server);
    }

    public function destroy($id)
    {
        $server = Server::find((int) $id);

        if (! $server) {
            return response()->json(['message' => 'Server not found'], 404);
        }

        Server::destroy((int) $id);

        return response()->json(['message' => 'Server deleted successfully']);
    }
}
