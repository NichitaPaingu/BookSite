@extends('layout.main')

@section('title')
Главная страница
@endsection

@section('content')
    <div class="presentation"></div>

    <div class="articles">
        @foreach ($articles as $el)
            <div class="post">
                <h1>Автор статьи:{{$el->user->name}}</h1>
                <img src="/storage/img/articles/{{$el->image}}">
                <h2>Название: {{$el->title}}</h2>
                <h2>Автор:{{$el->author}}</h2>
                <a href="/article/{{$el->id}}">Прочитать</a>
            </div>
        @endforeach
    </div>
@endsection