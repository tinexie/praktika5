<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>НАРУШЕНИЙ.НЕТ</title>
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
            <a href="{{ url('/reports/create') }}" class="button">создать заявление</a>
            <div class="sorting">
                <span>Сортировка по дате создания:</span>
                <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}">Сначала новые</a>
                <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}">Сначала старые</a>
            </div>
            <div class="filtering">
                <p>Фильтрация по статусу заявки</p>
                <ul>
                    @foreach ($statuses as $statusItem)
                        <li>
                            <a href="{{ route('reports.index', ['sort' => $sort, 'status' => $statusItem->id]) }}">
                                {{ $statusItem->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="reports">
                @foreach ($reports as $report)
                    <div class="report-card">
                        <div class="card-top">
                            <p class="date">{{ $report->created_at->format('d.m.Y') }}</p>
                            <div class="card-actions">
                                <a href="{{ route('reports.edit', $report->id) }}" title="Редактировать заявление"><img src="{{ asset('icons/pencil.svg') }}" alt="Редактировать"></a>
                                <form action="{{ route('reports.destroy', $report->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Удалить заявление"><img src="{{ asset('icons/bin.svg') }}" alt="Удалить"></button>
                                </form>
                            </div>
                        </div>
                        <p class="number">{{ $report->number }}</p>
                        <p class="description">{{ $report->description }}</p>
                        <p class="report-status">Статус: {{ $report->status->name }}</p>
                    </div>
                @endforeach
                {{ $reports->appends(request()->query())->links() }}
            </div>
        </main>
    </body>
</html>