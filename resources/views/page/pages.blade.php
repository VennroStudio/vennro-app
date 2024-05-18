<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
<h1>view all page</h1>
<hr>
<div><a href="{{ route('page.created') }}">Создать новую страницу</a></div>
<hr>
<div><a href="{{ route('page.musor') }}">Мусорка</a></div>
<hr>
<hr>
<div>
    <form action="{{ route('page.pages') }}">
        <input type="text" name="title" placeholder="title" value="{{ request()->get('title') }}">
        <input type="submit" value="Поиск">
        <a href="{{route('page.pages')}}">Сбросить</a>
    </form>
</div>
<hr>
@foreach($pages as $page)
    <div>
        <div>Тайтл:{{ $page->title }}</div>
        <div>Заголовок:{{ $page->name }}</div>
        <div>Дескриптор:{{ $page->description }}</div>
        <div>Контент:{{ $page->content }}</div>
        <div>Создана:{{ $page->updated_at }}</div>
        <div>
            <a href="{{ route('page.show', $page->id) }}">Просмотреть</a>
            <a href="{{ route('page.edit', $page->id) }}">Редактировать</a>
        </div>
        <hr>
        <div><form action="{{ route('page.deleted', $page->id) }}" method="Post">
            @csrf
            @method('Delete')
            <input type="submit" value="Удалить">
        </form></div>
    </div>
    <hr>
@endforeach
<div class="my-nav">
    {{ $pages->withQueryString()->links() }}
</div>
</body>
</html>
