<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Server;

class ServerController extends Controller
{
    public function index()
    {
        $deleted = session('deleted_servers', []);
        $servers = Server::all($deleted);

        return view('admin.servers.index', compact('servers'));
    }

    public function show(Server $server)
    {
        return view('admin.servers.show', compact('server'));
    }

    public function destroy(Server $server)
    {
        $deleted = session('deleted_servers', []);

        if (!in_array($server->id, $deleted, true)) {
            $deleted[] = $server->id;
            session(['deleted_servers' => $deleted]);
        }

        return redirect()->route('admin.servers.index')
            ->with('status', "Сервер \"{$server->name}\" видалено.");
    }
}
