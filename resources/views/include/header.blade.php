<header class="p-3 bg-dark text-white border-bottom rounded-3 sticky-top">
<div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img class="me-4" src="/img/logo.png" alt="" width="100px">
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('home') }}" class="nav-link px-2 text-white">Главная</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link px-2 text-white">Контакты</a></li>
        </ul>
            @guest()
            <div class="text-end">
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Войти</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light">Регистрация</a>
            </div>
            @endguest
            @auth()
            <div class="text-end">
                <p class="text-white mb-0 me-2">{{ Auth::user()->name }}</p>
            </div>
            <div class="dropdown text-end">
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('storage/img/upload/user/' . Auth::user()->photo) }}" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small">
                    @if(Auth::user()->role == 'admin')
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Админ панель</a></li>
                        <li><hr class="dropdown-divider"></li>
                    @endif
                        <li><a class="dropdown-item" href="/profile/id{{ Auth::user()->id }}">Профиль</a></li>
                    <li><a class="dropdown-item" href="#">Настройки</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Выход</a></li>
                    </form>
                </ul>
            </div>
            @endauth
    </div>
</div>
</header>





