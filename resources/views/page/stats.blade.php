@extends('layouts.app')

@section('content')
<div class="container">
    <div class="stats-content">
        <div class="stats-title">
            <h1>Статистика игроков сервера</h1>
        </div>

        <div class="row mb-4">
            <label for="search-input">Имя игрока:</label>

            <input id="search-input" type="text" />
        </div>

        <div class="stats-table">
            <table id="leaderboard">
                <thead>
                    <tr>
                        <th>Топ</th>
                        <th>Ник</th>
                        <th>Активное время игры</th>
{{--                        <th>Смерти</th>--}}
{{--                        <th>Убито мобов</th>--}}
{{--                        <th>Сломано блоков</th>--}}
{{--                        <th>Установлено блоков</th>--}}
                    </tr>
                </thead>
                <tbody id="players">

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('foot')
    @vite('resources/js/leaderboard.js');
@endpush
