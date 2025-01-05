@extends('layouts.main-admin-layout')
@section('title')
@endsection()

@section('content')
    <div class="container">
        <h1>Список вчителів</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Ім'я</th>
                <th>Прізвище</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Спеціалізація</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $teacher->first_name }}</td>
                    <td>{{ $teacher->last_name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone ?? 'Не вказано' }}</td>
                    <td>{{ $teacher->specialization ?? 'Не вказано' }}</td>
                    <td>
                        <a href="{{ route('admin.teacher.edit', $teacher->id) }}"
                           class="btn btn-warning btn-sm">Редагувати</a>
                        <form action="{{ route('admin.teacher.destroy', $teacher->id) }}" method="POST"
                              style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Ви впевнені?')">Видалити
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.teacher.create') }}" class="btn btn-primary">Додати вчителя</a>
    </div>

@endsection()
