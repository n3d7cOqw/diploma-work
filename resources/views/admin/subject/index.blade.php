@extends('layouts.main-admin-layout')

@section('content')
    <div class="container">
        <h1>Додати новий предмет</h1>

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

        <form action="{{ route('admin.subject.store') }}" method="POST">
            @csrf <!-- Захист від CSRF -->

            <!-- Поле для назви предмета -->
            <div class="mb-3">
                <label for="name" class="form-label">Назва предмета</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    value="{{ old('name') }}"
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
                    value="{{ old('code') }}"
                    required>
            </div>

            <!-- Поле для опису предмета -->
            <div class="mb-3">
                <label for="description" class="form-label">Опис предмета</label>
                <textarea
                    name="description"
                    id="description"
                    class="form-control"
                    rows="3">{{ old('description') }}</textarea>
            </div>

            <!-- Кнопка для відправки форми -->
            <button type="submit" class="btn btn-primary">Створити предмет</button>
        </form>
        <h1>Список предметів</h1>

        <!-- Повідомлення про успіх -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Перевірка наявності предметів -->
        @if ($subjects->isEmpty())
            <p>Наразі немає жодного предмета.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Назва</th>
                    <th>Код</th>
                    <th>Опис</th>
                    <th>Дії</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->code }}</td>
                        <td>{{ $subject->description ?? 'Немає опису' }}</td>
                        <td>
                            <!-- Кнопка для редагування -->
                            <a href="{{ route('admin.subject.edit', $subject->id) }}" class="btn btn-warning btn-sm">Редагувати</a>

                            <!-- Форма для видалення -->
                            <form action="{{ route('admin.subject.destroy', $subject->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Ви впевнені?')">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>
@endsection
