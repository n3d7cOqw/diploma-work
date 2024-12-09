@extends('layouts.main-admin-layout')
@section('title')
@endsection()

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Головна</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary">
                Експорт
            </button>
        </div>
    </div>

    <!-- Приклад карток -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Звіти</h5>
                    <p class="card-text">Перегляд та управління звітами</p>
                    <a href="#" class="btn btn-primary">Відкрити</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Користувачі</h5>
                    <p class="card-text">Управління користувачами системи</p>
                    <a href="{{route('admin.user.index')}}" class="btn btn-primary">Відкрити</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Налаштування</h5>
                    <p class="card-text">Налаштування системи</p>
                    <a href="#" class="btn btn-primary">Відкрити</a>
                </div>
            </div>
        </div>
    </div>

@endsection()
