@extends('layouts.app')

@section('title', 'Адмін — Сервери')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 text-white">Адмін: список серверів</h1>
            <p class="text-secondary mb-0">Тут відображається таблиця серверів.</p>
        </div>
    </div>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-dark table-striped align-middle">
            <thead>
                <tr>
                    <th>Назва</th>
                    <th>Гра</th>
                    <th>IP</th>
                    <th>Статус</th>
                    <th>Слоти</th>
                    <th class="text-end">Дії</th>
                </tr>
            </thead>
            <tbody>
                @forelse($servers as $server)
                    <tr>
                        <td>{{ $server->name }}</td>
                        <td>{{ $server->game }}</td>
                        <td>{{ $server->ip }}</td>
                        <td>{{ $server->status === 'active' ? 'активний' : 'вимкнений' }}</td>
                        <td>{{ $server->slots }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.servers.show', $server) }}" class="btn btn-sm btn-primary me-2">Переглянути</a>
                            <form method="POST" action="{{ route('admin.servers.destroy', $server) }}" class="d-inline" onsubmit="return confirm('Ти точно хочеш видалити сервер?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Сервери не знайдено.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
