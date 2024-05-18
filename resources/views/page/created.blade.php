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
<h1>create page</h1>
<hr>
<div><a href="{{ route('page.pages') }}">Все страницы</a></div>
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
    <form action="{{ route('page.addPage') }}" method="Post">
        @csrf
        <div style="margin-bottom:15px;"><input type="text" name="title" placeholder="Тайтл" value="{{ old('title') }}"></div>
        <div style="margin-bottom:15px;"><input type="text" name="name" placeholder="Заголовок" value="{{ old('name') }}"></div>
        <div style="margin-bottom:15px;"><input type="text" name="description" placeholder="Дескриптор" value="{{ old('description') }}"></div>
        <div style="margin-bottom:15px;"><input type="text" name="content" placeholder="Контент" value="{{ old('content') }}"></div>
        <div style="margin-bottom:15px;"><input type="submit" value="Создать"></div>
    </form>
</div>
<hr>
</body>
</html>
