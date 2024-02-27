<header class="site-header">

    <div class="header-wrap">
        <a class="logo" href="#0">
            <img alt="Логотип сайта" src="https://psv4.userapi.com/c235031/u157852698/docs/d29/74a2a80f7521/IMG_9429-removebg-preview.png?extra=yFMRQki_O6CSKBCi_Loe6aNV9wEneaS9fHpqVrgHXjgDYbSPuPzcKrXxMjH4NPn6YrP0Hq2tzvYrxjI6BzvY-GgvIUUEV8audW4ypmg31seGFuOF6jo3lCx2KC362vPqwU6IKc92OvZAhnx2ScqmCpNg" width="250" height="90">
        </a>

        <nav class="menu">
            <ul class="menu-list">
                <form class="search">
                    <label class="visually-hidden" for="search">Поиск по блогу</label>
                    <input id="search" type="search" class="search-field" name="search" placeholder="Найти..." required>
                    <button class="search-button"><span class="visually-hidden">Найти</span></button>
                </form>
                <li class="menu-item">
                    <a class="menu-link" href="#0">Главная</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="#0">Жанры</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="#0">Авторы</a>
                </li>
            </ul>
        </nav>
    </div>


    <h1 class="site-title">Платформа для поиска и обмена книг</h1>
</header>


<div class="content-wrap">


    <main class="main-posts-list">

        <article class="article">
                <div class="article-item">
                    @foreach($books as $book)
                    <div class="article-img-column">
                        <img class="article-img" src="">
                    </div>
                    <div class="article-text-column">
                        <h2 class="article-title">
                            <a class="article-title-link" href="#0">{{ $book->book_name }}</a>
                        </h2>
                        <cite class="article-genre">Жанр: {{ $book->genre }}</cite><br>
                        <cite class="article-author">Автор: {{ $book->author }}</cite><br>
                        <cite class="article-datetime">Дата издания: {{ $book->date_publication }}</cite><br>
                        <cite class="article-condition">Состояние: {{ $book->condition }}</cite>
                    </div>
                </div>
            @endforeach
        </article>

{{--        <article class="article">--}}

{{--            <div class="article-img-column">--}}
{{--                <img class="article-img" src="https://netology-code.github.io/html-2-diploma/sources/images/last-post2.jpg" alt="Йога">--}}
{{--            </div>--}}

{{--            <div class="article-text-column">--}}
{{--                <ul class="tab-list">--}}
{{--                    <li class="tab-item">--}}
{{--                        <a class="tab-link" href="#0">Health</a>--}}
{{--                    </li>--}}
{{--                    <li class="tab-item">--}}
{{--                        <a class="tab-link" href="#0">Lifestyle</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <h2 class="article-title">--}}
{{--                    <a class="article-title-link" href="#0">Йога для начинающих в домашних условиях</a>--}}
{{--                </h2>--}}
{{--                <time class="article-datetime" datetime="2019-06-10">10 июня 2019</time>--}}
{{--                <cite class="article-author">Неизвестный автор</cite>--}}
{{--                <div class="article-content">--}}
{{--                    <p>Расскажем, какие упражнения выбрать и как сделать коврик для занятий йогой из того, что можно найти в шкафу.</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </article>--}}

{{--        <article class="article">--}}

{{--            <div class="article-img-column">--}}
{{--                <img class="article-img" src="https://netology-code.github.io/html-2-diploma/sources/images/last-post3.jpg" alt="Музыкальный фестиваль">--}}
{{--            </div>--}}

{{--            <div class="article-text-column">--}}
{{--                <ul class="tab-list">--}}
{{--                    <li class="tab-item">--}}
{{--                        <a class="tab-link" href="#">Music</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <h2 class="article-title">--}}
{{--                    <a class="article-title-link" href="#0">Лучшие музыкальные фестивали этого лета</a>--}}
{{--                </h2>--}}
{{--                <time class="article-datetime" datetime="2019-06-10">10 июня 2019</time>--}}
{{--                <cite class="article-author">Неизвестный автор</cite>--}}
{{--                <div class="article-content">--}}
{{--                    <p>Лето на носу, а с ним и музыкальные фестивали. На каком же из них вы разобьёте свою палатку?</p>--}}
{{--                    <p>Мы составили список лучших летних фестивалей по всему миру.</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </article>--}}

{{--        <article class="article">--}}

{{--            <div class="article-img-column">--}}
{{--                <img class="article-img" src="https://netology-code.github.io/html-2-diploma/sources/images/last-post4.jpg" alt="Стол с едой">--}}
{{--            </div>--}}

{{--            <div class="article-text-column">--}}
{{--                <ul class="tab-list">--}}
{{--                    <li class="tab-item">--}}
{{--                        <a class="tab-link" href="#0">Lifestyle</a>--}}
{{--                    </li>--}}
{{--                    <li class="tab-item">--}}
{{--                        <a class="tab-link" href="#0">Food</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <h2 class="article-title">--}}
{{--                    <a  class="article-title-link" href="#0">Наукоёмкий подход к кулинарии</a>--}}
{{--                </h2>--}}
{{--                <time class="article-datetime" datetime="2019-06-10">10 июня 2019</time>--}}
{{--                <cite class="article-author">Неизвестный автор</cite>--}}
{{--                <div class="article-content">--}}
{{--                    <p>Узнаем основы проектирования новых пищевых и около-пищевых опытов, вскроем физику, химию и микробиологию еды.</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </article>--}}

{{--        <article class="article">--}}
{{--            <div class="article-img-column">--}}
{{--                <img class="article-img" src="https://netology-code.github.io/html-2-diploma/sources/images/last-post5.jpg" alt="Подушка с надписью 'Hang out spot'">--}}
{{--            </div>--}}

{{--            <div class="article-text-column">--}}
{{--                <ul class="tab-list">--}}
{{--                    <li class="tab-item">--}}
{{--                        <a class="tab-link" href="#0">Lifestyle</a>--}}
{{--                    </li>--}}
{{--                    <li class="tab-item">--}}
{{--                        <a class="tab-link" href="#0">Interior</a>--}}
{{--                    </li>--}}
{{--                    <li class="tab-item">--}}
{{--                        <a class="tab-link" href="#0">Art</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <h2 class="article-title">--}}
{{--                    <a class="article-title-link" href="#0">Делаем модные принты на подушках для интерьера</a>--}}
{{--                </h2>--}}
{{--                <time class="article-datetime" datetime="2019-06-10">10 июня 2019</time>--}}
{{--                <cite class="article-author">Неизвестный автор</cite>--}}
{{--                <div class="article-content">--}}
{{--                    <p>Подушки для дивана целесообразнее заказать в съемных чехлах на молнии,--}}
{{--                        если потребуется чистка подушек, проще снять чехлы, чем везти подушку в химчистку</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </article>--}}

{{--        <article class="article">--}}
{{--            <div class="article-img-column">--}}
{{--                <img class="article-img" src="https://netology-code.github.io/html-2-diploma/sources/images/last-post6.jpg" alt="Люди на вершине горы">--}}
{{--            </div>--}}

{{--            <div class="article-text-column">--}}
{{--                <ul class="tab-list">--}}
{{--                    <li class="tab-item">--}}
{{--                        <a class="tab-link" href="#0">Travel</a>--}}
{{--                    </li>--}}
{{--                    <li class="tab-item">--}}
{{--                        <a class="tab-link" href="#0">Lifestyle</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <h2 class="article-title">--}}
{{--                    <a class="article-title-link" href="#">Как первый раз отправиться в горы?</a>--}}
{{--                </h2>--}}
{{--                <time class="article-datetime" datetime="2019-06-10">10 июня 2019</time>--}}
{{--                <cite class="article-author">Неизвестный автор</cite>--}}
{{--                <div class="article-content">--}}
{{--                    <p>Для начала нужно определиться, в каком формате пройдёт ваше путешествие.--}}
{{--                        Это зависит от многих факторов, не только от ваших желаний и интересов.</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </article>--}}

{{--        <article class="article">--}}
{{--            <div class="article-img-column">--}}
{{--                <img class="article-img" src="https://netology-code.github.io/html-2-diploma/sources/images/last-post4.jpg" alt="Стол с едой">--}}
{{--            </div>--}}
{{--            <div class="article-text-column">--}}
{{--                <ul class="tab-list">--}}
{{--                    <li class="tab-item">--}}
{{--                        <a class="tab-link" href="#0">Lifestyle</a>--}}
{{--                    </li>--}}
{{--                    <li class="tab-item">--}}
{{--                        <a class="tab-link" href="#0">Food</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <h2 class="article-title">--}}
{{--                    <a  class="article-title-link" href="#0">Наукоёмкий подход к кулинарии</a>--}}
{{--                </h2>--}}
{{--                <time class="article-datetime" datetime="2019-06-10">10 июня 2019</time>--}}
{{--                <cite class="article-author">Неизвестный автор</cite>--}}
{{--                <div class="article-content">--}}
{{--                    <p>Узнаем основы проектирования новых пищевых и около-пищевых опытов, вскроем физику, химию и микробиологию еды.</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </article>--}}


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

    .article {
        display: flex;
    }

    .article:not(:last-child) {
        margin-bottom: 60px;
    }

    .article-text-column {
        width: 367px;
        padding-left: 30px;
    }

    .article-title {
        width: 330px;
        margin: 0;
        padding-bottom: 15px;
        text-transform: uppercase;
        font-size: 20px;
    }

    .article-title-link {
        text-decoration: none;
        color: #000;
    }

    .article-title-link:hover {
        color: #b59f5b;
    }

    .article-item {
        display: block;
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding: 10px;
    }

    .article-datetime {
        font-weight: bold;
        font-style: normal;
        font-size: 12px;
        line-height: 40px;
        color: black;
    }

    .article-condition {
        font-weight: bold;
        font-style: normal;
        font-size: 12px;
        line-height: 40px;
        color: black;
    }

    .article-author {
        font-weight: bold;
        font-style: normal;
        font-size: 12px;
        line-height: 40px;
        color: black;
    }

    .article-genre {
        font-weight: bold;
        font-style: normal;
        font-size: 12px;
        line-height: 40px;
        color: black;
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
</style>
