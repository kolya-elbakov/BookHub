<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой профиль</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <div class="profile-info">
        <nav class="menu">
            <ul class="menu-list">
                <a class="menu-link" href="/books">Главная</a>
            </ul>
            <ul class="menu-list">
                <a class="menu-link" href="{{route('reviews', $user->id)}}">Отзывы</a>
            </ul>
            <ul class="menu-list">
                <a class="menu-link" href="/add-book-form">Добавить книгу</a>
            </ul>
        </nav>
        <form action="{{ route('switch-profile', $user->id) }}" method="post">
            @csrf
            <button type="submit" class="profile-btn">
                @if ($user->is_profile_open)
                   <a style="background-color: #dc3545; color: white;">Закрыть профиль</a>
                @else
                    <a style="background-color: #28a745; color: white;">Открыть профиль</a>
                @endif
            </button>
        </form>
        <h2>Профиль пользователя</h2>
        <p><strong>Имя:</strong> {{$user->name}} {{$user->surname}}</p>
        <p><strong>Email:</strong> {{$user->email}}</p>
    </div>
    <div class="book-list">
        <h3>Мои книги для обмена и поиска</h3>
        <div class="book-item">
            @foreach($userBooks as $book)
                @if($book->images->isNotEmpty())
                    <img src ='{{ Storage::url($book->images->first()->image_path) }}' width="250" height="390" alt="Book 1">
                @endif
                <a class="article-name" href="{{ route('book-show', $book->id) }}">Название: {{ $book->book_name }} </a><br>
                <cite class="article-genre">Жанр: {{ $book->genre }} </cite><br>
                <cite class="article-author">Автор: {{ $book->author }}</cite><br>
                <cite class="article-datetime">Дата издания: {{ $book->date_publication }}</cite><br>
                <cite class="article-condition">Состояние: {{ $book->condition }}</cite>
                    <ul class="menu-list">
                        <a class="menu-link" href="{{ route('update-book', $book->id) }}">Редактировать книгу</a>
                    </ul>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h2, h3 {
        color: #333;
    }

    .profile-info {
        margin-bottom: 20px;
    }

    .book-list {
        display: grid;
        grid-template-columns: 1fr;
        gap: 10px;
    }

    .book-item {
        display: grid;
        grid-template-columns: 1fr 1fr; /* Две колонки для двух книг в ряду */
        gap: 20px; /* Расстояние между книгами */
    }

    .book-item img {
        max-width: 100%; /* Автоматический размер изображения внутри контейнера */
        height: auto; /* Поддержка соотношения сторон */
    }

    .book-item .article-name {
        font-weight: bold; /* Жирный шрифт для названия */
    }

    .book-item cite {
        display: block; /* Каждая информационная строка на новой строке */
    }

    .book-item cite:not(.article-name) {
        font-style: italic; /* Курсивный шрифт для жанра, автора, даты и состояния */
    }

    img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }
    .profile-btn {
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }
</style>
