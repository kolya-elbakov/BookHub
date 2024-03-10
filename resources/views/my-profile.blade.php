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
                <a class="menu-link" href="/add-book">Добавить книгу</a>
            </ul>
        </nav>
        <h2>Профиль пользователя</h2>
        <p><strong>Имя:</strong> {{$user->name}} {{$user->surname}}</p>
        <p><strong>Email:</strong> {{$user->email}}</p>
        <!-- Другая информация о пользователе -->
    </div>
    <div class="book-list">
        <h3>Мои книги для обмена и поиска</h3>
        <div class="book-item">
            @foreach($userBooks as $book)
            <img src ='{{$book->photo}}' width="250" height="390" alt="Book 1">
                <cite class="article-name">Название: {{ $book->book_name }} </cite><br>
                <cite class="article-genre">Жанр: {{ $book->genre }} </cite><br>
                <cite class="article-author">Автор: {{ $book->author }}</cite><br>
                <cite class="article-datetime">Дата издания: {{ $book->date_publication }}</cite><br>
                <cite class="article-condition">Состояние: {{ $book->condition }}</cite>
        </div>
        @endforeach
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
        background-color: #f9f9f9;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px; /* Добавляем отступ между книгами */
    }

    img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }
</style>
