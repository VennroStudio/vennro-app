@extends('layouts.index')

@section('title')
    Вход
@endsection

@section('content')
    <div class="container col-xl-10 col-xxl-9 px-4 py-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Добро пожаловать в Vennro Studio Project</h1>
                <p class="col-lg-10 fs-4">Делитесь своими успехами, результатами и обменивайтесь мнениями.</p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="{{ route('login') }}" method="post">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Вход</h1>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="userLogin" name="login" placeholder="userLogin"
                               value="{{ old('login') }}">
                        <label for="userLogin">Логин</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="userPassword" name="password"
                               placeholder="userPassword">
                        <label for="userPassword">Пароль</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-light" type="submit">Войти</button>
                    <hr class="my-4">
                    <div class="text-center">
                        <p class="mt-3 text-muted text-center mb-2">Не зарегистрированы?</p>
                        <a href="{{ route('register') }}" class="text-muted">Регистрация</a>
                    </div>
                    <hr class="my-4">
                    <p class="mt-3 mb-0 text-muted text-center">©Vennro Studio Project 2024</p>
                </form>
            </div>
        </div>
    </div>
@endsection

