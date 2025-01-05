@extends('layouts.main-admin-layout')
@section('title')
@endsection()

@section('content')
<div class="container mx-auto mt-6 flex flex-col lg:flex-row gap-6">


    <!-- Основний контент -->
    <main class="bg-white shadow rounded-lg w-full lg:w-3/4 p-6">
        <h2 class="text-2xl font-semibold mb-4">Налаштування груп</h2>

        <!-- Форма додавання групи -->
        <section>
            <h3 class="text-xl font-medium mb-4">Додати нову групу</h3>
            <form action="#" method="POST" class="space-y-4">
                @csrf
                @method('post')
                <div>
                    <label for="group-name" class="block text-gray-700 font-medium">Назва групи</label>
                    <input type="text" id="group-name" name="name" class="mt-1 block w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-200" required>
                </div>

                <div>
                    <label for="group-code" class="block text-gray-700 font-medium">Код групи</label>
                    <input type="text" id="group-code" name="abbreviated_name" class="mt-1 block w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-200" required>
                </div>

                <div>
                    <label for="group-head" class="block text-gray-700 font-medium">Куратор групи</label>
                    <select id="group-head" name="group_head" class="mt-1 block w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-200">
                        <option value="">Оберіть куратора</option>
                        <option value="1">Іван Іванов</option>
                        <option value="2">Марія Петренко</option>
                    </select>
                </div>

                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Додати групу</button>
                </div>
            </form>
        </section>

        <hr class="my-8">

        <!-- Список існуючих груп -->
        <section>
            <h3 class="text-xl font-medium mb-4">Список груп</h3>
            <table class="min-w-full bg-white border rounded">
                <thead class="bg-gray-200">
                <tr>
                    <th class="text-left p-4 border">Назва</th>
                    <th class="text-left p-4 border">Код</th>
                    <th class="text-left p-4 border">Куратор</th>
                    <th class="text-left p-4 border">Дії</th>
                </tr>
                </thead>
                <tbody>
                @foreach($studentGroups as $studentGroup)
                    <tr>
                        <td class="p-4 border">{{$studentGroup->name}}</td>
                        <td class="p-4 border">{{$studentGroup->abbreviated_name}}</td>
                        <td class="p-4 border">@if(isset($studentGroup->curator_id)){{$studentGroup->curator_id}}@endif</td>
                        <td class="p-4 border">
                            <a href="{{route('admin.student-group.edit', $studentGroup->id)}}"><button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Редагувати</button></a>
                            <a href="{{route('admin.student-group.destroy', $studentGroup->id)}}"><button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Видалити</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </main>
</div>
@endsection
