@extends('layouts.main-admin-layout')
@section('title')
@endsection()

@section('content')

    <div class="container">
        <h1>Розклад</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="">
            <select name="group_id" id="select_group">
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                @endforeach
            </select>
        </form>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>День тижня</th>
                <th>Час</th>
                <th>Група</th>
                <th>Предмет</th>
                <th>Викладач</th>
                <th>Аудиторія</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $schedule->day_of_week }}</td>
                    <td>{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                    <td>{{ $schedule->group->name }}</td>
                    <td>{{ $schedule->subject->name }}</td>
                    <td>{{ $schedule->teacher->first_name }} {{ $schedule->teacher->last_name }}</td>
                    <td>{{ $schedule->classroom->number }}</td>
                    <td>
                        <a href="{{ route('admin.schedule.edit', $schedule->id) }}"
                           class="btn btn-warning btn-sm">Редагувати</a>
                        <form action="{{ route('admin.schedule.destroy', $schedule->id) }}" method="POST"
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

        <a href="{{ route('admin.schedule.create') }}" class="btn btn-primary">Додати новий розклад</a>
    </div>
    <script>
        document.getElementById('select_group').addEventListener('change', function (event) {
            console.log('Вы выбрали значение:', event.target.value);

            const data = {
                group_id: document.getElementById('select_group').value,
            };

            fetch('/admin/schedule', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then(data => {
                    updateTable(data); // Обновляем таблицу
                    console.log(data)
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                });
        });

        /**
         * Функция для обновления таблицы на основе полученных данных
         * @param {Array} schedules
         */
        function updateTable(schedules) {
            const tbody = document.querySelector('table tbody');
            tbody.innerHTML = ''; // Очищаем существующие строки

            // Заполняем таблицу новыми строками
            schedules.forEach((schedule, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
            <td>${index + 1}</td>
            <td>${schedule.day_of_week}</td>
            <td>${schedule.start_time} - ${schedule.end_time}</td>
            <td>${schedule.group.abbreviated_name}</td>
            <td>${schedule.subject.name}</td>
            <td>${schedule.teacher.name} ${schedule.teacher.lastname}</td>
            <td>${schedule.classroom.number}</td>
            <td>
                <a href="/admin/schedule/${schedule.id}/edit" class="btn btn-warning btn-sm">Редагувати</a>
                <form action="/admin/schedule/${schedule.id}" method="POST" style="display: inline-block;">
                    <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Ви впевнені?')">Видалити</button>
                </form>
            </td>
        `;

                tbody.appendChild(row);
            });
        }

    </script>
@endsection()
