@extends('layouts.app')

@section('title', 'Додати серверу — Адмін')

@section('content')
    <a href="{{ route('admin.servers.index') }}" class="btn btn-secondary mb-4">← Назад до списку</a>

    <div class="card bg-dark text-white border-secondary">
        <div class="card-body">
            <h1 class="card-title mb-4">Додати новий сервер</h1>

            <form method="POST" action="{{ route('admin.servers.store') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Назва серверу</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="game" class="form-label">Гра</label>
                    <input type="text" class="form-control @error('game') is-invalid @enderror" id="game" name="game" value="{{ old('game') }}">
                    @error('game')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ip" class="form-label">IP адреса</label>
                    <input type="text" class="form-control @error('ip') is-invalid @enderror" id="ip" name="ip" placeholder="192.168.1.1" value="{{ old('ip') }}">
                    @error('ip')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slots" class="form-label">Кількість слотів</label>
                    <input type="number" class="form-control @error('slots') is-invalid @enderror" id="slots" name="slots" min="1" value="{{ old('slots') }}">
                    @error('slots')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Статус</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                        <option value="">Оберіть статус</option>
                        <option value="active" @if(old('status') === 'active') selected @endif>Активний</option>
                        <option value="inactive" @if(old('status') === 'inactive') selected @endif>Неактивний</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price_per_hour" class="form-label">Ціна за годину (грн)</label>
                    <input type="number" step="0.01" class="form-control @error('price_per_hour') is-invalid @enderror" id="price_per_hour" name="price_per_hour" min="0" value="{{ old('price_per_hour') }}">
                    @error('price_per_hour')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Опис (необов'язково)</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Додати сервер</button>
                    <a href="{{ route('admin.servers.index') }}" class="btn btn-secondary">Скасувати</a>
                </div>
            </form>
        </div>
    </div>
@endsection
