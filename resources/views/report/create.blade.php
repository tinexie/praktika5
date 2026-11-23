<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Создание заявления</title>
        @vite(['resources/css/app.css'])
    </head>
    <body>
        <header>
            <div class="header-content">
                <h1>НАРУШЕНИЙ<span>.НЕТ</span></h1>
                <p class="user-name">Носова Ольга Петровна<img src="{{ asset('icons/arrow.svg') }}" alt=""></p>
            </div>
        </header>

        <main class="container">

            <div class="breadcrumbs">
                <a href="{{ url('/reports') }}">Главная</a>
                &gt; Создание заявления
            </div>
                <form class="create-form" method="POST" action="{{ route('reports.store') }}">
                @csrf
                <input type="text" name="number" placeholder="регистрационный номер авто">
                <textarea name="description" placeholder="описание нарушения"></textarea>
                <button type="submit" class="button">создать заявление</button>
            </form>
        </main>
    </body>
</html>