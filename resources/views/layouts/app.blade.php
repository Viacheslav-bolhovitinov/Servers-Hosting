<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'GameBook')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #0f172a; color: #f8fafc; }
        .navbar, .footer { background: #111827; }
        .nav-link { color: #cbd5e1 !important; }
        .nav-link:hover { color: #7c3aed !important; }
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
                    <li class="nav-item"><a class="nav-link" href="/about">Про проєкт</a></li>
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
