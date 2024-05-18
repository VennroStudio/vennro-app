@extends('vennro.resources.views.layouts.index')

@section('title')
    Страничка контактов
@endsection

@section('content')
    <div class="container">
        <h1>Страница контактов</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form class="row row-cols-lg-auto g-3 align-items-center" action="{{ route('contact-form') }}" method="post">
            @csrf
            <label for="first_name">Имя</label>
            <input type="text" class="form-control" id="first_name" name="first_name">
            <label for="last_name">Фамилия</label>
            <input type="text" class="form-control" id="last_name" name="last_name">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection

@section('menu-site')
    @parent
    <li><a href="#" class="nav-link px-2 link-dark">Сходи в магаз</a></li>
@endsection
