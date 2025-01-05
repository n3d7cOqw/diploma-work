@extends('layouts.main-admin-layout')

@section('title', 'Редагування куратора')

@section('content')
    <div class="container-fluid py-4">
        <h1 class="mb-4">Редагування куратора</h1>

        <form action="{{ route('admin.curator.update', $curator->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="curatorName" class="form-label">Ім'я</label>
                <input type="text" class="form-control" id="curatorName" name="name" value="{{ old('name', $curator->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="curatorSurname" class="form-label">Прізвище</label>
                <input type="text" class="form-control" id="curatorSurname" name="surname" value="{{ old('surname', $curator->surname) }}" required>
            </div>

            <div class="mb-3">
                <label for="curatorPhone" class="form-label">Номер телефону</label>
                <input type="tel" class="form-control" id="curatorPhone" name="phone" value="{{ old('phone', $curator->phone) }}">
            </div>

            <div class="mb-3">
                <label for="curatorEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="curatorEmail" name="email" value="{{ old('email', $curator->email) }}">
            </div>

            <div class="mb-3">
                <label for="curatorStudentGroup" class="form-label">Група</label>
                <select class="form-select" name="student_group_id">
                    <option value="">Виберіть групу</option>
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}" @if($group->id == old('student_group_id', $curator->student_group_id)) selected @endif>
                            {{ $group->abbreviated_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="department" class="form-label">Департамент</label>
                <input type="text" class="form-control" id="department" name="department" value="{{ old('department', $curator->department) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Зберегти</button>
            <a href="{{ route('admin.curator.index') }}" class="btn btn-secondary">Скасувати</a>
        </form>
    </div>
@endsection
