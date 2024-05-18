@extends('layouts.index')

@section('title')
    Авторизация
@endsection

@section('content')
    <div class="text-center">
        <div class="col-lg-4 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary mt-4 mb-4" action="{{ route('register') }}" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Регистрация</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" id="userName" name="name" placeholder="userName">
                    <label for="userName">Имя</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="userLastname" name="lastname"
                           placeholder="userLastname">
                    <label for="userLastname">Фамиля</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="userLogin" name="login" placeholder="userLogin">
                    <label for="userLogin">Логин</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="userPassword" name="password"
                           placeholder="userPassword">
                    <label for="userPassword">Пароль</label>
                </div>
                <button class="w-100 btn btn-lg btn-light mt-4" type="submit">Зарегистрироваться</button>
                <hr class="my-4">
                <p class="mt-3 mb-0 text-muted">©Vennro Studio Project 2024</p>
            </form>
        </div>
    </div>
@endsection
