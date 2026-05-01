<x-guest-layout>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-4 text-secondary">
        Це захищена зона. Підтвердіть свій пароль для продовження.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success">Підтвердити</button>
        </div>
    </form>
</x-guest-layout>
