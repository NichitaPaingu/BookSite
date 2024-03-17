@extends('layout.main')
@section('title')
Регистрация
@endsection
@section('content')
<div class="auth">
<h1>Регистрация</h1>
<form method="POST" action="/register" class="auth" enctype="multipart/form-data">
    @csrf
        <label for="name">Name</label>
        <input id="name" type="name" value="{{old('name')}}" name="name">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{old('email')}}">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" value="{{old('password')}}">
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" name="password_confirmation">                
        <input type="submit" value="Зарегестрироваться" class="enter-button">
        </form>
</div>
@endsection
