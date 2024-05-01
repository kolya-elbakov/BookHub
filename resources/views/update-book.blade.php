<!DOCTYPE html>
<html lang="en">
<head>
    <ul class="menu-list">
        <a class="menu-link" href="/my-profile">Назад</a>
    </ul>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование книги</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Редактирование книги</h1>
    <form action="{{ route('update-book', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="book_name">Название книги:</label>
        <input type="text" id="book_name" name="book_name" value="{{$book->book_name}}">

        <label for="author">Автор:</label>
        <input type="text" id="author" name="author" value="{{$book->author}}">

        <label for="genre">Жанр:</label>
        <input type="text" id="genre" name="genre" value="{{$book->genre}}">

        <label for="image">Изображение:</label>
        <input type="file" name="images[]" multiple placeholder="Фото" required><br>

        <label for="date_publication">Дата издания:</label>
        <input type="date" id="date_publication" name="date_publication" value="{{$book->date_publication}}">

        <label for="condition">Состояние книги:</label><br>
        <select name="condition">
            <option value="1">★☆☆☆☆</option>
            <option value="2">★★☆☆☆</option>
            <option value="3" selected>★★★☆☆</option>
            <option value="4">★★★★☆</option>
            <option value="5">★★★★★</option>
        </select><br>

        <button type="submit">Сохранить</button>
        <a href="{{ route('delete-book', ['bookId' => $book->id]) }}" onclick="return confirm('Вы уверены, что хотите удалить книгу?')">Удалить</a>
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
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        margin-top: 50px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    form {
        margin-top: 20px;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    input,
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
