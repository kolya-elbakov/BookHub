<header class="site-header">

    <div class="header-wrap">
        <a class="logo" href="">
            <img alt="Логотип сайта" src="https://psv4.userapi.com/c235031/u157852698/docs/d29/74a2a80f7521/IMG_9429-removebg-preview.png?extra=yFMRQki_O6CSKBCi_Loe6aNV9wEneaS9fHpqVrgHXjgDYbSPuPzcKrXxMjH4NPn6YrP0Hq2tzvYrxjI6BzvY-GgvIUUEV8audW4ypmg31seGFuOF6jo3lCx2KC362vPqwU6IKc92OvZAhnx2ScqmCpNg" width="250" height="90">
        </a>

        <nav class="menu">
            <ul class="menu-list">
                <a class="menu-link" href="/books">Главная</a>
            </ul>
        </nav>
    </div>
    <h1 class="site-title">Платформа для поиска и обмена книг</h1>
</header>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация о книге</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="book-info">
    <img src="{{ $book->photo }}" alt="Фото Книги" class="book-photo">
    <div class="book-details">
        <h1>{{ $book->book_name }}</h1>
        <p><strong>Жанр:</strong> {{ $book->genre }}</p>
        <p><strong>Автор:</strong> {{ $book->author }}</p>
        <p><strong>Состояние:</strong> {{ $book->condition }}</p>
        <p><strong>Владелец:</strong> {{ $user->name }} {{$user->surname}}</p>
        <div class="rating">
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9734;</span>
        </div>
    </div>
</div>
</body>
</html>

<style>
    .book-info {
        display: flex;
        align-items: center;
        margin: 20px;
    }

    .book-photo {
        width: 200px;
        height: auto;
        margin-right: 20px;
    }

    .book-details {
        font-family: Arial, sans-serif;
    }

    .rating {
        font-size: 24px;
    }

    .star {
        color: orange;
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

    .header-wrap {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 1170px;
        margin: 0 auto;
        padding-top: 25px;
        position: relative;
        z-index: 2;
    }

    .site-title {
        width: 685px;
        margin: 0 auto;
        padding: 105px 0 128px 0;
        text-transform: uppercase;
        text-align: center;
        font-weight: bold;
        font-size: 45px;
        line-height: 75px;
        color: #ffffff;
        position: relative;
        z-index: 2;
    }

    .site-header {
        position: relative;
        background-image: url("https://netology-code.github.io/html-2-diploma/sources/images/banner-bg.jpg");
        background-color: rgba(0, 0, 0, 0.6);
        background-size: cover;
    }

    .site-header::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #000;
        opacity: 0.6;
        z-index: 1;
    }

    .menu-list {
        display: flex;
        flex-wrap: wrap;
    }
</style>
