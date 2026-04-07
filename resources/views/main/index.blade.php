@extends('layouts.app')

@section('title', 'Головна — GameBook')

@section('content')
    <div style="text-align:center; padding: 60px 0;">
        <h1 style="font-size:42px; color:#7c3aed; margin-bottom:16px;">
            🎮 Система бронювання ігрових серверів
        </h1>
        <p style="font-size:18px; color:#aaa; max-width:600px; margin: 0 auto 30px;">
            Обирай сервер, бронюй на потрібний час і грай без турбот.
            Понад 50 ігор у каталозі.
        </p>
        <a href="/servers" class="btn" style="font-size:18px; padding: 14px 36px;">
            Переглянути сервери
        </a>
    </div>

    <div style="display:grid; grid-template-columns: repeat(3,1fr); gap:20px; margin-top:40px;">
        <div style="background:#1a1a2e; padding:24px; border-radius:10px; border:1px solid #2a2a4a;">
            <div style="font-size:32px;">🖥️</div>
            <h3 style="color:#7c3aed; margin:10px 0 8px;">50+ серверів</h3>
            <p style="color:#aaa;">Широкий вибір ігрових серверів для будь-якого жанру</p>
        </div>
        <div style="background:#1a1a2e; padding:24px; border-radius:10px; border:1px solid #2a2a4a;">
            <div style="font-size:32px;">⚡</div>
            <h3 style="color:#7c3aed; margin:10px 0 8px;">Миттєве бронювання</h3>
            <p style="color:#aaa;">Забронюй сервер за лічені секунди без зайвих кроків</p>
        </div>
        <div style="background:#1a1a2e; padding:24px; border-radius:10px; border:1px solid #2a2a4a;">
            <div style="font-size:32px;">🔒</div>
            <h3 style="color:#7c3aed; margin:10px 0 8px;">Безпечно</h3>
            <p style="color:#aaa;">Захищені платежі та гарантія повернення коштів</p>
        </div>
    </div>
@endsection