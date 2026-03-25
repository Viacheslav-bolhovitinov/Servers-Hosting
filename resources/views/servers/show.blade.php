@extends('layout')

@section('title', $server['name'] . ' — GameBook')

@section('content')
    <a href="/servers" style="color:#7c3aed; text-decoration:none;">← Назад до каталогу</a>

    <div style="background:#1a1a2e; padding:36px; border-radius:12px; border:1px solid #2a2a4a; margin-top:20px; max-width:700px;">
        <h1 style="color:#7c3aed; margin-bottom:20px;">{{ $server['name'] }}</h1>

        <table style="width:100%; border-collapse:collapse; margin-bottom:20px;">
            <tr style="border-bottom:1px solid #2a2a4a;">
                <td style="padding:10px; color:#888;">🎮 Гра</td>
                <td style="padding:10px; color:#e0e0e0; font-weight:bold;">{{ $server['game'] }}</td>
            </tr>
            <tr style="border-bottom:1px solid #2a2a4a;">
                <td style="padding:10px; color:#888;">👥 Кількість слотів</td>
                <td style="padding:10px; color:#e0e0e0; font-weight:bold;">{{ $server['slots'] }}</td>
            </tr>
            <tr style="border-bottom:1px solid #2a2a4a;">
                <td style="padding:10px; color:#888;">💰 Ціна</td>
                <td style="padding:10px; color:#e0e0e0; font-weight:bold;">{{ $server['price'] }} грн/год</td>
            </tr>
            <tr>
                <td style="padding:10px; color:#888;">📡 Статус</td>
                <td style="padding:10px; font-weight:bold;
                    color: {{ $server['status'] === 'Доступний' ? '#22c55e' : '#ef4444' }}">
                    {{ $server['status'] }}
                </td>
            </tr>
        </table>

        <p style="color:#aaa; line-height:1.8; margin-bottom:24px;">
            {{ $server['description'] }}
        </p>

        @if($server['status'] === 'Доступний')
            <a href="#" class="btn" style="font-size:16px; padding:12px 30px;">
                🎯 Забронювати сервер
            </a>
        @else
            <p style="color:#ef4444; font-weight:bold;">❌ Сервер зараз недоступний для бронювання</p>
        @endif
    </div>
@endsection