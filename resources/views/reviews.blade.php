<!DOCTYPE html>
<html lang="en">
<ul class="menu-list">
    <a class="menu-link" href="/books">Главная</a>
</ul>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы</title>
</head>
<body>
<h1>Отзывы пользователя</h1>
@foreach($userReviews as $userReview)
    <div class="request">
        <h2>Отзыв от <span class="user">{{$userReview->author->name}} {{$userReview->author->surname}}</span></h2>
        <p>Сообщение: {{$userReview->comment}}</p>
        <p>Оценка: {{$userReview->grade}}</p>
        <p>Дата отзыва: {{$userReview->date_review}}</p>
    </div>
@endforeach
</body>
</html>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .request {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 10px;
    }

    h2 {
        color: #333;
    }

    .user {
        font-weight: bold;
    }

    .book {
        font-style: italic;
    }

    .confirm-checkbox, .reject-checkbox {
        display: none;
    }

    .confirm {
        cursor: pointer;
        padding: 5px 10px;
        border: 1px solid #333;
        border-radius: 5px;
        margin-right: 10px;
        background: forestgreen;
    }

    .reject {
        cursor: pointer;
        padding: 5px 10px;
        border: 1px solid #333;
        border-radius: 5px;
        margin-right: 10px;
        background: orangered;
    }
</style>
