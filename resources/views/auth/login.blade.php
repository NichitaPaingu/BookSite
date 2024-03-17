@extends('layout.main')
@section('title')
Авторизация
@endsection
@section('content')
<div class="auth">
<h1>Авторизация</h1>
<form method="POST" action="/login" class="auth" enctype="multipart/form-data">
    @csrf
        <label for="email">Email</label>
        <input id="email" type="email" name="email">
        <label for="password">Password</label>
        <input id="password" type="password" name="password">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Запомнить меня</label>
        <input type="submit" value="Войти" class="enter-button">
        </form>
</div>
@endsection
