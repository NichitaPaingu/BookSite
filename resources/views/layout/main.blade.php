<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script src="{{asset('resources/js/app.js')}}" defer></script>
</head>
<body>
    <div class="page">
        <header class="header">
            <a  href="/" class="logo">Books</ф>
            <nav>
                <a href="/">Главная</a>
                <a href="/about">Про нас</a>


                @if(Auth::guest())
                <a href="/login">Войти</a>
                <a href="/register">Регистрация</a>
            @else
                <a href="/article/add">Добавить статью</a>
                <a href="/home">{{Auth::user()->name}}</a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="logout">Выйти</button>
                </form>
            @endguest
            </nav>
        </header>
        <main class="main">
            @include('blocks.message')
            @yield('content')
        </main>

        <footer class="footer">Все права защищены</footer>
    </div>
</body>
</html>