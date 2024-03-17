@extends('layout.main')
@section('title')
{{$article->title}}
@endsection
@section('content')
<h1>Статья на Books</h1>
<h1>Автор статьи:{{$article->user->name}}</h1>
<h1>Email:{{$article->user->email}}</h1>

<div class="articles">
    <div class="post">
        <img src="/storage/img/articles/{{$article->image}}">
        <p>{{$article->title}}</p>
        <p>{{$article->author}}</p>
        <p>{{$article->comment}}</p>
        @auth
        @if(Auth::user()->id==$article->user_id)
        <br>
        <hr>
        <div class="change">
        <a href="/article/{{$article->id}}/edit">Изменить</a>
        <form method="POST" action="{{$article->id}}/delete">
            @csrf
            @method("DELETE")
            <button type="submit" class="delete-button">Удалить</button>
        </form>
        </div>
        @endif
        @endauth
        
    </div>
</div>
@endsection