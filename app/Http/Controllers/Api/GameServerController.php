<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;

class GameServerController extends Controller
{
    // GET /api/servers?game=CS2
    public function index(Request $request)
    {
        $query = Server::query();

        if ($request->has('game') && $request->game !== 'all') {
            $query->where('game', $request->game);
        }

        return response()->json($query->get());
    }

    // GET /api/servers/{id}
    public function show($id)
    {
        $server = Server::find($id);
        if (! $server) {
            return response()->json(['message' => 'Server not found'], 404);
        }

        return response()->json($server);
    }

    // POST /api/servers/store
    public function store(Request $request)
    {
        $server = Server::create($request->all());
        return response()->json($server, 201);
    }

    // PUT /api/servers/{id}
    public function update(Request $request, $id)
    {
        $server = Server::find($id);
        if (! $server) {
            return response()->json(['message' => 'Server not found'], 404);
        }
        $server->update($request->all());
        return response()->json($server);
    }

    // DELETE /api/servers/{id}
    public function destroy($id)
    {
        $server = Server::find($id);
        if (! $server) {
            return response()->json(['message' => 'Server not found'], 404);
        }
        $server->delete();
        return response()->json(['message' => 'Server deleted successfully']);
    }
}
