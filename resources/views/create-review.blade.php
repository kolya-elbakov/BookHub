<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Написать отзыв</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Написать отзыв о пользователе</h1>

<form action="{{ route('create-review', ['userId' => $userId]) }}" method="POST">
    @csrf
    <label for="grade">Оценка (от 1 до 5):</label>
    <select name="grade">
        <option value="1">★☆☆☆☆</option>
        <option value="2">★★☆☆☆</option>
        <option value="3" selected>★★★☆☆</option>
        <option value="4">★★★★☆</option>
        <option value="5">★★★★★</option>
    </select><br>

    <label for="comment">Комментарий:</label><br>
    <textarea name="comment" id="comment" rows="4" required></textarea><br><br>

    <label for="date_review">Дата отзыва:</label>
    <input type="date" name="date_review" id="date_review" required><br><br>

    <button type="submit">Отправить отзыв</button>
</form>

</body>
</html>

<style>
body {
font-family: Arial, sans-serif;
max-width: 600px;
margin: 0 auto;
padding: 20px;
}

h1 {
text-align: center;
}

form {
background: #f9f9f9;
padding: 20px;
border-radius: 5px;
}

label {
font-weight: bold;
}

input, textarea {
width: 100%;
padding: 5px;
margin: 5px 0 10px;
box-sizing: border-box;
}

button {
background: #4CAF50;
color: white;
padding: 10px 20px;
border: none;
border-radius: 5px;
cursor: pointer;
}

button:hover {
background: #45a049;
}
</style>
