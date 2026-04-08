<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index()
    {
        $deleted = array_map('intval', session('deleted_servers', []));
        $servers = Server::all($deleted);

        return view('admin.servers.index', compact('servers'));
    }

    public function create()
    {
        return view('admin.servers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'game' => 'required|string|max:255',
            'ip' => 'required|ip',
            'slots' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
            'price_per_hour' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Server::create($validated);

        return redirect()->route('admin.servers.index')
            ->with('success', 'Сервер успішно додано');
    }

    public function edit($id)
    {
        $server = Server::find((int) $id);

        if (!$server) {
            return redirect()->route('admin.servers.index')
                ->with('status', 'Сервер не знайдено.');
        }

        return view('admin.servers.edit', compact('server'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'game' => 'required|string|max:255',
            'ip' => 'required|ip',
            'slots' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
            'price_per_hour' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $server = Server::update($id, $validated);

        if (!$server) {
            return redirect()->route('admin.servers.index')
                ->with('status', 'Сервер не знайдено.');
        }

        return redirect()->route('admin.servers.index')
            ->with('success', 'Інформацію про сервер оновлено.');
    }

    public function show($id)
    {
        $deleted = array_map('intval', session('deleted_servers', []));
        $server = Server::find((int) $id, $deleted);

        if (!$server) {
            return redirect()->route('admin.servers.index')
                ->with('status', 'Сервер не знайдено.');
        }

        return view('admin.servers.show', compact('server'));
    }

    public function destroy($id)
    {
        $server = Server::find((int) $id);

        if (!$server) {
            return redirect()->route('admin.servers.index')
                ->with('status', 'Сервер не знайдено.');
        }

        $deleted = session('deleted_servers', []);

        if (!in_array($server->id, $deleted, true)) {
            $deleted[] = $server->id;
            session()->put('deleted_servers', $deleted);
        }

        session()->save();

        return redirect()->route('admin.servers.index')
            ->with('status', "Сервер \"{$server->name}\" видалено.");
    }
}
