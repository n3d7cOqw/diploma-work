@extends('layouts.main-admin-layout')
@section('title')
@endsection()

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Список користувачів</h1>
        <a href="{{route('admin.user.create')}}" class="btn btn-primary mb-3">Додати користувача</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>І'мя</th>
                <th>Прізвище</th>
                <th>Роль</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
{{--                    <td>{{$post->surname}}</td>--}}
{{--                    <td>{{$post->updated_at}}</td>--}}
                    <td>{{$user->role === 0 ? "Адміністратор" : ($user->role === 1 ? "Студент" : "Викладач") }}</td>
                    <td>
                        <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-sm btn-warning">Редагувати</a>
                        <form action="{{route('admin.user.destroy', $user->id)}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
@endsection()
