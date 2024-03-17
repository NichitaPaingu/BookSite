@extends('layout.main')
@section('title')
Добавление статьи
@endsection
@section('content')
<div class="articles">
    <h1>Добавление статьи</h1>
    <form method="POST" class="article-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="title">Измените название книги</label>
        <input type="text" name="title"  value="{{$article->title}}">

        <label for="author">Измените автора книги</label>
        <input type="text" name="author" value="{{$article->author}}">
        
        <label for="image">Измените фото книги</label>
        <input type="file" name="image">

        <label for="comment">Измените ваш отзыв о книге</label>
        <textarea id="editor" name="comment">{{$article->comment}}</textarea>

        <input class="add-button" type="submit" value="Добавить">
    </form>
</div>
@endsection