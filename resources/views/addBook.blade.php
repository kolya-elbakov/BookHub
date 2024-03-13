<ul class="menu-list">
    <a class="menu-link" href="/My-profile">Назад</a>
</ul>
<form action="{{ route('add-book-save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="book_name" placeholder="Название книги" required><br>
    <input type="text" name="author" placeholder="Автор книги" required><br>
    <input type="text" name="genre" placeholder="Жанр книги" required><br>
    <input type="file" name="image" placeholder="Фото" required><br>
    <input type="date" name="date_publication" placeholder="Дата публикации" required><br>

    <label for="condition">Состояние книги:</label><br>
    <select name="condition">
        <option value="1">★☆☆☆☆</option>
        <option value="2">★★☆☆☆</option>
        <option value="3" selected>★★★☆☆</option>
        <option value="4">★★★★☆</option>
        <option value="5">★★★★★</option>
    </select><br>

    <button type="submit">Добавить книгу</button>
</form>
@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

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
