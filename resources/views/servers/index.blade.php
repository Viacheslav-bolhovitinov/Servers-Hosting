@extends('layouts.app')

@section('title', 'Каталог серверів — GameBook')

@section('content')
    <h1 style="color:#7c3aed; margin-bottom:30px;">🖥️ Каталог ігрових серверів</h1>

    <div style="display:grid; grid-template-columns: repeat(2,1fr); gap:20px;">
        @foreach($servers as $server)
        <div style="background:#1a1a2e; padding:24px; border-radius:10px; border:1px solid #2a2a4a;">
            <h2 style="color:#e0e0e0; margin-bottom:8px;">{{ $server->name }}</h2>
            <p style="color:#aaa; margin-bottom:4px;">Гра: <strong>{{ $server->game }}</strong></p>
            <p style="color:#aaa; margin-bottom:4px;">Слотів: <strong>{{ $server->slots }}</strong></p>
            @if($server->price_per_hour)
                <p style="color:#aaa; margin-bottom:4px;">Ціна: <strong>{{ number_format($server->price_per_hour, 2) }} грн/год</strong></p>
            @endif
            <p style="margin-bottom:16px;">
                Статус:
                <span style="color: {{ $server->status === 'active' ? '#22c55e' : '#ef4444' }}; font-weight:bold;">
                    {{ $server->status === 'active' ? 'активний' : 'вимкнений' }}
                </span>
            </p>
            <a href="{{ route('servers.show', $server->id) }}" class="btn">Детальніше</a>
        </div>
        @endforeach
    </div>
@endsection