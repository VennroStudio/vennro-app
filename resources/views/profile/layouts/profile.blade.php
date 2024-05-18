<!DOCTYPE html>
<html lang="ru" data-bs-theme="dark">

<head>
    @include('profile.include.meta')
    @livewireStyles
</head>
<body>
@include('include.header')

<div class="b-example-divider"></div>
@yield('content')
<div class="b-example-divider"></div>
@include('profile.include.footer')
@livewireScripts
</body>
</html>
