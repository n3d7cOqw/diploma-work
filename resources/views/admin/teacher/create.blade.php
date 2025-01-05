@extends('layouts.main-admin-layout')
@section('title')
    Додавання викладача
@endsection()


@section('content')
    <div class="container">
        <h1>Додати вчителя</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.teacher.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="first_name" class="form-label">Ім'я</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Прізвище</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Телефон</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
            </div>

            <div class="mb-3">
                <label for="specialization" class="form-label">Спеціалізація</label>
                <input type="text" name="specialization" id="specialization" class="form-control" value="{{ old('specialization') }}">
            </div>

            <button type="submit" class="btn btn-success">Зберегти</button>
            <a href="{{ route('admin.teacher.index') }}" class="btn btn-secondary">Назад</a>
        </form>
    </div>
@endsection
