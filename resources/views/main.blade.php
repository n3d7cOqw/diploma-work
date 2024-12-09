@extends('layouts.main-layout')
@section('title')
    Головна
@endsection
@section('content')
<!-- Основний банер -->
<section class="bg-light py-5 text-center">
    <div class="container">
        <h2>Ласкаво просимо до нашого коледжу!</h2>
        <p class="lead">Відкриваємо двері до знань і успіху</p>
        <a href="#programs" class="btn btn-primary">Дізнатися більше</a>
    </div>
</section>

<!-- Про коледж -->
<section id="about" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Про коледж</h2>
        <p>Наш коледж пропонує якісну освіту, поєднуючи традиційні та сучасні методи навчання. Ми пишаємося нашими студентами та випускниками, які досягають успіху в різних сферах.</p>
    </div>
</section>

<!-- Програми навчання -->
<section id="programs" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Програми навчання</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Інформаційні технології</h5>
                        <p class="card-text">Опановуйте програмування, бази даних та мережеві технології.</p>
                        <a href="#" class="btn btn-primary">Детальніше</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Економіка</h5>
                        <p class="card-text">Вивчайте економіку, фінанси та управління бізнесом.</p>
                        <a href="#" class="btn btn-primary">Детальніше</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Гуманітарні науки</h5>
                        <p class="card-text">Занурюйтесь в історію, культуру та соціальні науки.</p>
                        <a href="#" class="btn btn-primary">Детальніше</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Новини та події -->
<section id="news" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Новини та події</h2>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="@if($post->image_url !== null) {{asset('storage/' . $post->image_url) }} @endif " class="card-img-top" alt="Новина 1">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->summary}}</p>
                            <a href="#" class="btn btn-outline-primary">Читати далі</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Відгуки студентів -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Відгуки студентів</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <p>«Чудове місце для навчання! Викладачі завжди готові допомогти.»</p>
                            <footer class="blockquote-footer">Анастасія Іванова, студентка 3 курсу</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <p>«Я здобув чудові знання та практичний досвід.»</p>
                            <footer class="blockquote-footer">Іван Петров, випускник</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Футер сайту -->
<footer id="contacts" class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Контакти</h5>
                <p>Адреса: Сумська обл., місто Ромни, вул. Героїв Роменщини, 250</p>
                <p>Телефон: (05448) 7-20-33</p>
                <p>Email: info@rckneu.com.ua
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <h5>Ми в соцмережах</h5>
                <a href="#" class="text-white me-3">Facebook</a>
                <a href="#" class="text-white">Instagram</a>
            </div>
        </div>
    </div>
</footer>
@endsection

