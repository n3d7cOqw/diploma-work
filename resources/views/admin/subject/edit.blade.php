@extends('layouts.main-admin-layout')
@section('title')
@endsection()

@section('content')
        <div class="container">
            <h1>Редагувати предмет: {{ $subject->name }}</h1>

            <!-- Перевірка помилок валідації -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.subject.update', $subject->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <!-- Поле для назви предмета -->
                <div class="mb-3">
                    <label for="name" class="form-label">Назва предмета</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        value="{{ old('name', $subject->name) }}"
                        required>
                </div>

                <!-- Поле для коду предмета -->
                <div class="mb-3">
                    <label for="code" class="form-label">Код предмета</label>
                    <input
                        type="text"
                        name="code"
                        id="code"
                        class="form-control"
                        value="{{ old('code', $subject->code) }}"
                        required>
                </div>

                <!-- Поле для опису предмета -->
                <div class="mb-3">
                    <label for="description" class="form-label">Опис предмета</label>
                    <textarea
                        name="description"
                        id="description"
                        class="form-control"
                        rows="3">{{ old('description', $subject->description) }}</textarea>
                </div>

                <!-- Кнопки -->
                <button type="submit" class="btn btn-success">Оновити предмет</button>
                <a href="{{ route('admin.subject.index') }}" class="btn btn-secondary">Скасувати</a>
            </form>
        </div>
@endsection()
