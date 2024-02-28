<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Жанры</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Список Жанров</h1>
    <a class="menu-item">
        <a class="menu-link" href="/books">Главная</a>
    </a>
</header>
<main>
    <ul class="genre-list">
        @foreach ($genres as $genre)
            <li>{{ $genre->genre }}
                <a class="book-count">
                    {{$genre->book_count}} книг
                </a>
            </li>
        @endforeach
    </ul>
</main>
</body>
</html>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px 0;
    }

    main {
        width: 80%;
        margin: 20px auto;
    }

    .genre-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .genre-list li {
        background-color: #f4f4f4;
        margin-bottom: 5px;
        padding: 10px;
        border-radius: 5px;
    }

    .book-count{
        float: right;
    }

    .menu-item:nth-child(n+2) {
        margin-left: 33px;
        float: right;
    }

    .menu-link {
        text-decoration: none;
        text-transform: uppercase;
        font-size: 20px;
        color: wheat;
        /*float: right;*/
    }

    .menu-link:hover {
        text-decoration: underline;
    }
</style>
