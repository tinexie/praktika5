<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Редактирование заявления</title>
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
                &gt; Редактирование заявления
            </div>
                <form class="create-form" method="POST" action="{{ route('reports.update', $report->id) }}">
                    @csrf
                    @method('PUT')
                <input type="text" name="number" value="{{ $report->number }}" placeholder="регистрационный номер авто">
                <textarea name="description" placeholder="описание нарушения">{{ $report->description }}</textarea>
                <button type="submit" class="button">сохранить изменения</button>
            </form>
        </main>
    </body>
</html>