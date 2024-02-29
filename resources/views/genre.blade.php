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
    <title>Жанры</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Список Жанров</h1>
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
