@extends('layouts.main-admin-layout')

@section('content')
    <div class="container">
        <h1>Аудиторії</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Номер</th>
                <th>Тип</th>
                <th>Закріплений викладач</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($classrooms as $classroom)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $classroom->number }}</td>
                    <td>{{ $classroom->type }}</td>
                    <td>{{ $classroom->teacher ? $classroom->teacher->first_name . ' ' . $classroom->teacher->last_name : 'Немає' }}</td>
                    <td>
                        <a href="{{ route('admin.classroom.edit', $classroom->id) }}" class="btn btn-warning btn-sm">Редагувати</a>
                        <form action="{{ route('admin.classroom.destroy', $classroom->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Ви впевнені?')">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.classroom.create') }}" class="btn btn-primary">Додати нову аудиторію</a>
    </div>
@endsection
