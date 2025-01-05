@extends('layouts.main-admin-layout')

@section('title', 'Редагувати групу')

@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Редагувати інформацію про групу</h1>

        <form action="{{ route('admin.student-group.update', $group->id) }}" method="POST" class="space-y-4 bg-white p-6 shadow rounded-lg">
            @csrf
            @method('PATCH')

            <div>
                <label for="group-name" class="block text-gray-700 font-medium">Назва групи</label>
                <input type="text" id="group-name" name="name" value="{{ old('name', $group->name) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-200" required>
            </div>

            <div>
                <label for="group-code" class="block text-gray-700 font-medium">Код групи</label>
                <input type="text" id="group-code" name="abbreviated_name" value="{{ old('abbreviated_name', $group->abbreviated_name) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-200" required>
            </div>

            <div>
                <label for="group-head" class="block text-gray-700 font-medium">Куратор групи</label>
                <select id="group-head" name="group_head" class="mt-1 block w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-200">
                    <option value="">Оберіть куратора</option>
                    @foreach ($curators as $curator)
                        <option value="{{ $curator->id }}" {{ old('group_head', $group->group_head) == $curator->id ? 'selected' : '' }}>
                            {{ $curator->name }} {{ $curator->surname }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Зберегти зміни</button>
            </div>
        </form>
    </div>
@endsection
