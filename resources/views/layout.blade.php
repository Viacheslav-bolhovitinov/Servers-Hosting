<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GameBook — Бронювання серверів')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #0f0f1a; color: #e0e0e0; }
        nav {
            background: #1a1a2e;
            padding: 15px 40px;
            display: flex;
            align-items: center;
            gap: 30px;
            border-bottom: 2px solid #7c3aed;
        }
        nav .logo { font-size: 22px; font-weight: bold; color: #7c3aed; text-decoration: none; }
        nav a { color: #ccc; text-decoration: none; font-size: 15px; }
        nav a:hover { color: #7c3aed; }
        .container { max-width: 1100px; margin: 40px auto; padding: 0 20px; }
        .btn {
            display: inline-block;
            background: #7c3aed;
            color: white;
            padding: 10px 22px;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 10px;
        }
        .btn:hover { background: #6d28d9; }
        footer {
            text-align: center;
            padding: 20px;
            margin-top: 60px;
            color: #555;
            border-top: 1px solid #222;
        }
    </style>
</head>
<body>
    <nav>
        <a href="/" class="logo">🎮 GameBook</a>
        <a href="/">Головна</a>
        <a href="/servers">Сервери</a>
        <a href="/about">Про проєкт</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>© 2026 GameBook — Система бронювання ігрових серверів</p>
    </footer>
</body>
</html>