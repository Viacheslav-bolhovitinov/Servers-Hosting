@extends('layouts.app')

@section('title', 'Адмін — ' . $server->name)

@section('content')
    <a href="{{ route('admin.servers.index') }}" class="btn btn-secondary mb-4">← Назад до списку</a>

    <div class="card bg-dark text-white border-secondary">
        <div class="card-body">
            <h1 class="card-title">{{ $server->name }}</h1>
            <p class="text-muted mb-4">Гра: {{ $server->game }} · IP: {{ $server->ip }}</p>

            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <div class="text-secondary">Статус</div>
                    <div>{{ $server->status === 'active' ? 'активний' : 'вимкнений' }}</div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-secondary">Слоти</div>
                    <div>{{ $server->slots }}</div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-secondary">Ціна за годину</div>
                    <div>{{ $server->price_per_hour ? number_format($server->price_per_hour, 2) . ' грн' : 'немає' }}</div>
                </div>
            </div>

            <div class="mb-4">
                <div class="text-secondary mb-2">Опис</div>
                <p>{{ $server->description }}</p>
            </div>

            <div class="bg-secondary bg-opacity-10 p-3 rounded">
                <h5 class="mb-3">Бронювання</h5>
                @if($server->reserved_by)
                    <p class="mb-1"><strong>Хто:</strong> {{ $server->reserved_by }}</p>
                    <p class="mb-0"><strong>На який час:</strong> {{ $server->reserved_until }}</p>
                @else
                    <p class="mb-0">Немає активного бронювання.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
