<x-guest-layout>
    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
        </div>

        <div class="mb-3 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label" for="remember_me">Запам'ятати мене</label>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Забули пароль?</a>
                @endif
            </div>
            <button type="submit" class="btn btn-success">Увійти</button>
        </div>
    </form>

    <div class="mt-4 text-center">
        <span>Ще немає облікового запису?</span>
        <a href="{{ route('register') }}">Зареєструватися</a>
    </div>
</x-guest-layout>
