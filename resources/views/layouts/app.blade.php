<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'GameBook')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #0f172a; color: #f8fafc; }
        .navbar { background: #009245; }
        .footer { background: #111827; }
        .nav-link { color: #ffffff !important; }
        .nav-link:hover { color: #d1fae5 !important; }
        .navbar-text { color: #ffffff; }
        .btn { display: inline-block; background: #7c3aed; color: #fff; border-radius: 6px; padding: 10px 22px; text-decoration: none; }
        .btn:hover { background: #6d28d9; color: #fff; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark border-bottom border-secondary">
        <div class="container">
            <a class="navbar-brand" href="/">GameBook</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Головна</a></li>
                    <li class="nav-item"><a class="nav-link" href="/servers">Каталог серверів</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="/admin/servers">Адмін</a></li>
                    @endauth
                    <li class="nav-item"><a class="nav-link" href="/about">Про проєкт</a></li>
                    @auth
                        <li class="nav-item d-flex align-items-center ms-3">
                            <span class="navbar-text">Вітаємо, {{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item ms-2">
                            <form method="POST" action="{{ route('logout') }}" class="d-flex">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-light">Вийти</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Увійти</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Реєстрація</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        @yield('content')
    </main>

    <footer class="footer py-4 text-center text-muted border-top border-secondary">
        <div class="container">
            © 2026 GameBook — Система бронювання ігрових серверів. Всі права захищені.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
