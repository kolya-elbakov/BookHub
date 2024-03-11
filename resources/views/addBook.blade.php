<form action="{{ route('add-book-save') }}" method="post">
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
