@extends('layouts.app')

@section('content')
{{--Featured content--}}
<div class="home-featured">

    <div class="container home-featured-content">
        <div class="home-featured-title">
            <h1>SocialCraft</h1>
            <p>От маленьких шагов в игре - к большим в жизни</p>
            <div>
                <a href="#" class="btn btn-accent">Начать играть</a>
            </div>
        </div>

        <div class="home-featured-image">
            <img src="{{ Vite::asset('resources/images/featured.png') }}" alt="SocialCraft">
        </div>
    </div>
</div>

{{--Experience--}}
<section id="experience">
    <div class="container py-5 text-center">
        <h2>Наши возможности</h2>
        <p class="mb-5">
            Мы предлагаем множество возможностей для игры и общения
        </p>
        <ul class="grid-experience">
            <li class="box">
                <div class="icon">
                    🎉
                </div>
                <div class="title">
                    <h3>Разнообразные ивенты</h3>
                </div>
                <div class="description">
                    <p>Регулярные события и соревнования для всех игроков.</p>
                </div>
            </li>
            <li class="box">
                <div class="icon">
                    🤝
                </div>
                <div class="title">
                    <h3>Сплочённое сообщество</h3>
                </div>
                <div class="description">
                    <p>Дружелюбная атмосфера и поддержка участников.</p>
                </div>
            </li>
            <li class="box">
                <div class="icon">
                    📚
                </div>
                <div class="title">
                    <h3>Образовательные программы</h3>
                </div>
                <div class="description">
                    <p>Учитесь новым навыкам и получайте полезные знания через игровые механики.</p>
                </div>
            </li>
        </ul>
    </div>
</section>

{{--Statistic--}}
<section id="statistics">
    <div class="container-fluid home-statistics py-5">
        <div class="container-limit">
            <h2 class="mt-4">Статистика</h2>
            <p class="mb-5 mx-auto opacity-65" style="max-width: 700px;">
                В этой секции вы найдете актуальную информацию об активности игроков и числе игроков онлайн. Узнайте, кто сегодня лидирует
            </p>

            <ul class="online-stats">
                <li>
                    <div class="number">{{ $online }}</div>
                    <div>Онлайн</div>
                </li>
            </ul>

            <div class="my-4">
                <a href="/stats" class="btn">Статистика игроков</a>
            </div>
        </div>
    </div>
</section>
{{--    Donate--}}
<section id="donations">
    <div class="container home-donation py-5">
        <x-donation/>
    </div>
</section>

@endsection

@push('foot')
    <script src="@vite('resources/js/server_status.js')"></script>
@endpush
