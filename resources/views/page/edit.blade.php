<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>edit page</h1>
<hr>
<div><a href="{{ route('page.pages') }}">Все страницы</a></div>
<hr>
<div><a href="{{ route('page.show', $page->id) }}">Просмотреть</a></div>
<hr>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    <form action="{{ route('page.updated', $page->id) }}" method="Post">
        @csrf
        @method('Patch')
        <div style="margin-bottom:15px;"><input type="text" name="title" placeholder="Тайтл" value="{{ $page->title }}"></div>
        <div style="margin-bottom:15px;"><input type="text" name="name" placeholder="Заголовок" value="{{ $page->name }}"></div>
        <div style="margin-bottom:15px;"><input type="text" name="description" placeholder="Дескриптор" value="{{ $page->description }}"></div>
        <div style="margin-bottom:15px;"><input type="text" name="content" placeholder="Контент" value="{{ $page->content }}"></div>
        <div style="margin-bottom:15px;"><input type="submit" value="Сохранить"></div>
    </form>
</div>
<hr>
</body>
</html>
