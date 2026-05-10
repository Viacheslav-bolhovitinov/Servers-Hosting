<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index()
    {
        $servers = Server::all();

        return view('servers.index', compact('servers'));
    }

    public function show($id)
    {
        $server = Server::find($id);

        if (!$server) {
            return redirect('/servers')->with('error', 'Сервер не знайдено');
        }

        return view('servers.show', compact('server'));
    }
}
