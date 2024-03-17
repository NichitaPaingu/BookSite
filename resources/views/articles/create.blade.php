@extends('layout.main')
@section('title')
Добавление статьи
@endsection
@section('content')
<div class="articles">
    <h1>Добавление статьи</h1>
    <form method="POST" class="article-form" enctype="multipart/form-data">
        @csrf
        <label for="title">Название книги</label>
        <input type="text" name="title" placeholder="Введите название книги">

        <label for="author">Автор книги</label>
        <input type="text" name="author" placeholder="Введите название книги">
        
        <label for="image">Фото книги</label>
        <input type="file" name="image">

        <label for="comment">Ваш отзыв о книге</label>
        <textarea id="editor" name="comment" placeholder="Ваш отзыв о книге"></textarea>

        <input class="add-button" type="submit" value="Добавить">
    </form>
</div>
@endsection