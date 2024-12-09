@extends('layouts.main-admin-layout')
@section('title')
@endsection()

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Список постів</h1>
    <a href="{{route('admin.post.create')}}" class="btn btn-primary mb-3">Додати пост</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Заголовок</th>
            <th>Дата створення</th>
            <th>Дата оновлення</th>
            <th>Статус</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td>{{$post->status}}</td>
                <td>
                    <a href="{{route('admin.post.edit', $post->id)}}" class="btn btn-sm btn-warning">Редагувати</a>
                    <form action="{{route('admin.post.destroy', $post->id)}}" method="POST" style="display: inline-block;">
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
