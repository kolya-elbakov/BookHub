<header class="site-header">

    <div class="header-wrap">
        <a class="logo" href="">
            <img alt="Логотип сайта" src="{{Storage::url('images/a6e11657-a33b-4031-9ab7-3fec64e15da3.jpeg')}}" width="250" height="90">
        </a>

        <nav class="menu">
            <ul class="menu-list">
                <li class="menu-item">
                    <a class="menu-link" href="{{ route('my-chats') }}">Мои чаты</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="/genres">Жанры</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="/authors">Авторы</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="{{ route('signout') }}">Logout</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="/my-profile">{{ $user->name }} <br>{{$user->surname}}</a>
                </li>
                <li class="menu-list">
                    <a class="menu-link" href="/applic-book">Заявки</a>

                </li>
            </ul>
        </nav>
    </div>
    <h1 class="site-title">Платформа для поиска и обмена книг</h1>
</header>


<div class="content-wrap">


    <main class="main-posts-list">
        @foreach($allBooks as $book)
        <article class="article">
                <div class="article-item">
                    <div class="article-img-column">
                        @if($book->images->isNotEmpty())
                            <img src ='{{ Storage::url($book->images->first()->image_path) }}' width="250" height="390" alt="Book 1">
                        @endif
                    </div>
                    <div class="article-text-column">
                        <h2 class="article-title">
                            <a class="article-title-link" href="{{ route('book', $book->id) }}">{{ $book->book_name }}</a>
                        </h2>
                        <cite class="article-genre">Жанр: {{ $book->genre }}</cite><br>
                        <cite class="article-author">Автор: {{ $book->author }}</cite><br>
                        <cite class="article-datetime">Дата издания: {{ $book->date_publication }}</cite><br>
                        <cite class="article-condition">Состояние: {{ $book->condition }}</cite>
                        <a href="{{route('application', $book->id)}}" class="btn">Создать заявку на обмен книги</a>
                    </div>
                </div>
        </article>
        @endforeach
    </main>

<style>
    @font-face {
        font-family: "Open Sans";
        src:url(https://netology-code.github.io/html-2-diploma/sources/fonts/OpenSans-Regular.woff);
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: "Open Sans";
        src:url(https://netology-code.github.io/html-2-diploma/sources/fonts/OpenSans-Bold.woff);
        font-weight: bold;
        font-style: normal;
    }

    body {
        min-width: 1200px;
        margin: 0;
        font-family: "Open Sans", "Arial", sans-serif;
        font-size: 14px;
        color: black;
        background-color: white;
    }

    .visually-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        border: 0;
        clip: rect(0 0 0 0);
        overflow: hidden;
    }

    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    img {
        vertical-align: middle;
    }


    /* ШАПКА */
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

    .menu-list {
        display: flex;
        flex-wrap: wrap;
    }

    .menu-item:nth-child(n+2) {
        margin-left: 33px;
    }

    .menu-link {
        text-decoration: none;
        text-transform: uppercase;
        font-size: 13px;
        color: #ded6d1;
    }

    .menu-link:hover {
        text-decoration: underline;
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

    .content-wrap {
        width: 1170px;
        margin: 0 auto;
        padding: 61px 0 64px 0;
        display: flex;
        justify-content: space-between;
    }

    .main-posts-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .article {
        width: 48%; /* Ширина каждой книги (2% для отступа между книгами) */
        margin-bottom: 20px; /* Отступ между строками */
    }

    .article-item {
        display: flex;
    }

    .article-img-column {
        flex: 1;
    }

    .article-img {
        max-width: 100%;
        height: auto;
    }

    .article-text-column {
        flex: 2;
        padding-left: 20px; /* Отступ между изображением и текстом */
    }

    .article-title {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .article-genre, .article-author, .article-datetime, .article-condition {
        font-size: 14px;
        margin-bottom: 5px;
    }

    .btn {
        display: inline-block;
        margin-top: 10px;
        padding: 5px 10px;
        background-color: beige;
        color: #fff;
        text-decoration: none;
    }

    .search {
        padding-bottom: 55px;
    }

    .search-field {
        box-sizing: border-box;
        padding-left: 15px;
        width: 220px;
        height: 48px;
        vertical-align: middle;
        outline: none;
        border: transparent 1px solid;
        background-color: #f4f7f6;
    }

    .search-field:focus {
        border: 1px solid #b59f5b;
    }

    .search-button {
        width: 48px;
        height: 48px;
        background-color: #b59f5b;
        border: none;
        background-image:url("https://netology-code.github.io/html-2-diploma/sources/images/search.svg");
        background-repeat: no-repeat;
        background-size: 18px;
        background-position: center center;
        vertical-align: middle;
        transition: color 0.3s, background-color 0.3s;
    }

    .search-button:hover {
        background-color: #000;
    }

    .btn {
        background-color: #2ca02c;
        color: black;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
    }
</style>
