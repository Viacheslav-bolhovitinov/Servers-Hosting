<x-guest-layout>
    <div class="mb-4 text-secondary">
        Дякуємо за реєстрацію! Підтвердіть свою email-адресу за посиланням, яке ми вам надіслали. Якщо лист не прийшов, ми можемо надіслати його ще раз.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            Нове посилання на підтвердження було відправлено на вашу пошту.
        </div>
    @endif

    <div class="d-flex gap-2">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-success">Надіслати повторно</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary">Вийти</button>
        </form>
    </div>
</x-guest-layout>
