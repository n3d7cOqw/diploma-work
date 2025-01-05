@extends('layouts.main-admin-layout')

@section('content')
    <div class="container">
        <h1>Редагувати розклад</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.schedule.update', $schedule->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="day_of_week" class="form-label">День тижня</label>
                <select name="day_of_week" id="day_of_week" class="form-control" required>
                    <option value="">Оберіть день</option>
                    @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                        <option value="{{ $day }}" {{ old('day_of_week', $schedule->day_of_week) == $day ? 'selected' : '' }}>{{ $day }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="start_time" class="form-label">Час початку</label>
                <input type="time" name="start_time" id="start_time" class="form-control" value="{{ old('start_time', $schedule->start_time) }}" required>
            </div>

            <div class="mb-3">
                <label for="end_time" class="form-label">Час завершення</label>
                <input type="time" name="end_time" id="end_time" class="form-control" value="{{ old('end_time', $schedule->end_time) }}" required>
            </div>

            <div class="mb-3">
                <label for="group_id" class="form-label">Група</label>
                <select name="group_id" id="group_id" class="form-control" required>
                    <option value="">Оберіть групу</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}" {{ old('group_id', $schedule->group_id) == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="subject_id" class="form-label">Предмет</label>
                <select name="subject_id" id="subject_id" class="form-control" required>
                    <option value="">Оберіть предмет</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ old('subject_id', $schedule->subject_id) == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="teacher_id" class="form-label">Викладач</label>
                <select name="teacher_id" id="teacher_id" class="form-control" required>
                    <option value="">Оберіть викладача</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('teacher_id', $schedule->teacher_id) == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->first_name }} {{ $teacher->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="classroom_id" class="form-label">Аудиторія</label>
                <select name="classroom_id" id="classroom_id" class="form-control" required>
                    <option value="">Оберіть аудиторію</option>
                    @foreach ($classrooms as $classroom)
                        <option value="{{ $classroom->id }}" {{ old('classroom_id', $schedule->classroom_id) == $classroom->id ? 'selected' : '' }}>{{ $classroom->number }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Оновити</button>
            <a href="{{ route('admin.schedule.index') }}" class="btn btn-secondary">Назад</a>
        </form>
    </div>
@endsection
