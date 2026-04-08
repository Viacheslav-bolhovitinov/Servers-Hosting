<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index()
    {
        $deleted = array_map('intval', session('deleted_servers', []));
        $servers = Server::all($deleted);

        return view('servers.index', compact('servers'));
    }

    public function show($id)
    {
        $deleted = array_map('intval', session('deleted_servers', []));
        $server = Server::find((int) $id, $deleted);

        if (!$server) {
            return redirect('/servers')->with('error', 'Сервер не знайдено');
        }

        return view('servers.show', compact('server'));
    }
}
