
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    .card-img-top{
        height: 200px;
    }
</style>
<!-- Шапка сайту -->
<header class="bg-primary text-white py-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3">РФК КНЕУ</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="#about">Про коледж</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#programs">Вступникам</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#news">Новини</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#contacts">Контакти</a></li>
                    @if(auth()->check())

                    <li class="nav-item"><a class="nav-link text-white" href="{{route('dashboard')}}">Мій аккаунт</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link text-white" href="{{route('login')}}">Ввійти в аккаунт</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{route('register')}}">Реєстрація</a></li>

                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>
@yield('content')

