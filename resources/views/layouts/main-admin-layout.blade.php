<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Адмін панель')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Бічна панель навігації -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar ">
            <div class="position-sticky">
                <h4 class="text-center my-3">Адмін панель</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <i class="bi bi-house"></i> Головна
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-file-earmark-text"></i> Звіти
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-people"></i> Користувачі
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-gear"></i> Налаштування
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.post.index')}}">
                            <i class="bi bi-gear"></i> Публікації
                        </a>
                    </li>
                </ul>
            </div>
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
