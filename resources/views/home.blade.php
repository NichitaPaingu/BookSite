@extends('layout.main')
@section('title')
Кабинет пользователя
@endsection
@section('content')
<div class="block">
    <h1>Кабинет пользователя</h1>
    @if (session('status'))
        <div class="succes-mess" role="alert">
            {{ session('status') }}
        </div>
    @endif
            <p>Привет {{Auth::user()->name}}</p>
            <p>{{Auth::user()->email}}</p>
</div>
@if(count($articles)>0)
    <div class="articles">
        @foreach ($articles as $el)
    <div class="post">
        <img src="/storage/img/articles/{{$el->image}}">
        <p>Название:{{$el->title}}</p>
        <p>Автор:{{$el->author}}</p>
        <p>Отзыв:{{$el->comment}}</p>
        <div class="change">
            <a href="/article/{{$el->id}}/edit">Изменить</a>
            <form method="POST" action="{{$el->id}}/delete">
                @csrf
                @method("DELETE")
                <button type="submit" class="delete-button">Удалить</button>
            </form>
        </div>
    </div>
    @endforeach
    </div>
@endif
@endsection
