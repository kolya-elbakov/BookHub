<header class="site-header">

    <div class="header-wrap">
        <a class="logo" href="">
            <img alt="Логотип сайта" src="{{Storage::url('images/a6e11657-a33b-4031-9ab7-3fec64e15da3.jpeg')}}" width="250" height="90">
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
    <title>Оформление заявки на обмен</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Оформление заявки на обмен</h1>
    <form action="{{ route('application', $book->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Фамилия:</label>
            <input type="text" id="surname" name="surname" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="sender_book_id">Мои книги:</label>
            <select id="sender_book_id" name="sender_book_id" required>
                @foreach($userBooks as $book)
                    <option type="hidden" name="book_id_{{$book->id}}" value="{{$book->id}}">{{$book->book_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="message">Сообщение:</label>
            <input type="text" id="message" name="message" placeholder="Введите сообщение">
        </div>
        <button type="submit">Подтвердить заявку</button>
    </form>
</div>
</body>
</html>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #2ca02c;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: green;
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

    #message{
        margin-bottom: 20px;
        width: 600px; /* Ширина поля в пикселях */
        height: 100px; /* Высота поля в пикселях */
        padding: 10px; /* Внутренние отступы для текста внутри поля */
        font-size: 14px; /* Размер шрифта */
        border: 1px solid #ccc; /* Граница поля */
        border-radius: 5px;
    }
</style>
