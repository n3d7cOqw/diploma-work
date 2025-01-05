<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Адмін панель')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<style>
    /* Основний стиль для сайдбара */
    .sidebar {
        background-color: #ffffff; /* Білий фон */
        color: #34495e; /* Темно-синій текст */
        height: 100vh; /* Висота на весь екран */
        width: 250px; /* Ширина */
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        flex-direction: column;
        padding: 20px 0;
        border-right: 2px solid #e5e5e5; /* Тонка сіра лінія праворуч */
    }

    /* Заголовок */
    .sidebar-header {
        text-align: center;
        margin-bottom: 20px;
        font-size: 1.5rem;
        font-weight: bold;
        color: #2980b9; /* Яскраво-синій */
    }

    /* Меню */
    .sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-menu li {
        margin: 15px 0;
    }

    .sidebar-menu a {
        text-decoration: none;
        display: flex;
        align-items: center;
        font-size: 1rem;
        color: #34495e;
        padding: 10px 20px;
        border-radius: 5px; /* Закруглення */
        transition: all 0.3s ease-in-out;
    }

    /* Іконки та текст */
    .sidebar-menu a i {
        font-size: 1.5rem;
        margin-right: 10px;
        color: #2980b9; /* Синій для іконок */
    }

    /* Ховер та активний стан */
    .sidebar-menu a:hover {
        background-color: #f0f8ff; /* Світло-синій фон */
        color: #2980b9; /* Яскраво-синій текст */
    }

    .sidebar-menu a.active {
        background-color: #2980b9; /* Синій фон для активного пункту */
        color: #ffffff; /* Білий текст */
    }

    /* Адаптивність */
    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
        }

        .sidebar-menu a {
            font-size: 0.9rem;
        }
    }
</style>
<div class="container-fluid">
    <div class="row">
        <!-- Бічна панель навігації -->
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <h4>Адмін панель</h4>
            </div>
            <ul class="sidebar-menu">
                <li>
                    <a href="{{route('main')}}" class="active">
                        <i class="bi bi-house"></i>
                        <span>Головна</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Звіти</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.user.index')}}">
                        <i class="bi bi-people"></i>
                        <span>Користувачі</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-gear"></i>
                        <span>Налаштування</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.post.index')}}">
                        <i class="bi bi-file-earmark-post"></i>
                        <span>Публікації</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.student-group.index')}}">
                        <i class="bi bi-collection"></i>
                        <span>Групи</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.curator.index')}}">
                        <i class="bi bi-person-circle"></i>
                        <span>Куратори</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.subject.index')}}">
                        <i class="bi bi-book"></i>
                        <span>Предмети</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.teacher.index')}}">
                        <i class="bi bi-person-badge"></i>
                        <span>Викладачі</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.schedule.index')}}">
                        <i class="bi bi-calendar3"></i>
                        <span>Розклад</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.classroom.index')}}">
                        <i class="bi bi-building"></i>
                        <span>Аудиторії</span>
                    </a>
                </li>

            </ul>
        </nav>




        <!-- Основна область контенту -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')

        </main>
    </div>
</div>
<footer>
    <p>&copy; 2024 Адмін панель</p>
</footer>
</body>
</html>
