<!DOCTYPE html>
<html lang="en">
<ul class="menu-list">
    <a class="menu-link" href="/books">Назад</a>
</ul>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявки на обмен книг</title>
</head>
<body>
<h1>Заявки на обмен книг</h1>
@foreach($userApplics as $userApplic)
    <div class="request">
    <h2>Заявка от <span class="user">{{$userApplic->senderUser->name}} {{$userApplic->senderUser->surname}}</span></h2>
    <p>Хочет обменять книгу <span class="book">"{{$userApplic->senderBook->book_name}}"</span> на вашу книгу "{{$userApplic->recipientBook->book_name}}".</p>
    <p>Сообщение: {{$userApplic->message}}</p>
    <input type="checkbox" class="confirm-checkbox" id="confirm-1">
    <label for="confirm-1" class="confirm">✔ Подтвердить</label> //два разных роута для кнопок, смена статуса заявки плюс обмен книг между участниками
    <input type="checkbox" class="reject-checkbox" id="reject-1">
    <label for="reject-1" class="reject">✖ Отклонить</label>
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

    .confirm-label {
        cursor: pointer;
        padding: 5px 10px;
        border: 1px solid #333;
        border-radius: 5px;
        margin-right: 10px;
        background: forestgreen;
    }

    .reject-label {
        cursor: pointer;
        padding: 5px 10px;
        border: 1px solid #333;
        border-radius: 5px;
        margin-right: 10px;
        background: orangered;
    }
</style>
