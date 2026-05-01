<x-guest-layout>
    <div class="mb-4 text-secondary">
        Вкажіть email, і ми надішлемо вам посилання для скидання пароля.
    </div>

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

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <button type="submit" class="btn btn-success">Надіслати посилання</button>
    </form>

    <div class="mt-4 text-center">
        <a href="{{ route('login') }}">Повернутися до входу</a>
    </div>
</x-guest-layout>
