@extends('layouts.app')

@section('title', 'Про проєкт — GameBook')

@section('content')
    <h1 style="color:#7c3aed; margin-bottom:20px;">Про проєкт</h1>

    <div style="background:#1a1a2e; padding:30px; border-radius:10px; border:1px solid #2a2a4a; max-width:700px;">
        <p style="line-height:1.8; color:#ccc; margin-bottom:16px;">
            <strong style="color:#7c3aed;">GameBook</strong> — це курсовий проєкт з розробки
            веб-застосунку на базі фреймворку Laravel.
        </p>
        <p style="line-height:1.8; color:#ccc; margin-bottom:16px;">
            Тема: <strong>Система бронювання ігрових серверів</strong>
        </p>
        <ul style="color:#aaa; line-height:2; padding-left:20px;">
            <li>Перегляд каталогу ігрових серверів</li>
            <li>Детальна інформація про кожен сервер</li>
            <li>Система бронювання та оплати</li>
            <li>Особистий кабінет користувача</li>
        </ul>
        <p style="margin-top:20px; color:#777; font-size:14px;">
            Технології: PHP, Laravel, MySQL, Blade Templates
        </p>
    </div>
@endsection