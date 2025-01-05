@extends('layouts.main-admin-layout')

@section('content')
    <div class="container">
        <h1>Додати аудиторію</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.classroom.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="number" class="form-label">Номер</label>
                <input type="number" name="number" id="number" class="form-control" value="{{ old('number') }}" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Тип</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required>
            </div>

            <div class="mb-3">
                <label for="teacher_id" class="form-label">Закріплений викладач</label>
                <select name="teacher_id" id="teacher_id" class="form-control">
                    <option value="">Оберіть викладача</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->first_name }} {{ $teacher->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Зберегти</button>
            <a href="{{ route('admin.classroom.index') }}" class="btn btn-secondary">Назад</a>
        </form>
    </div>
@endsection
