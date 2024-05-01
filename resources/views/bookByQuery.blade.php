<li class="menu-item">
    <a class="menu-link" href="/authors">Назад</a>
</li>
<main class="main-posts-list">
    @if (isset($authorData))
        <h3>Автор:</h3>
        <p>Имя: {{ $authorData['name'] ?? '' }}</p>
        <p>Дата рождения: {{ $authorData['birth_date'] ?? '' }}</p>
        <p>Лучшее произведение: {{ $authorData['top_work'] ?? '' }}</p>
        <h3>Книги автора:</h3>
    @elseif (isset($genre))
        <h3>Жанр: {{ $genre }}</h3>
        <h3>Книги в этом жанре:</h3>
    @endif

    @foreach($books as $book)
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
        background-color: #2ca02c;
        color: #fff;
        text-decoration: none;
    }

    .menu-item:nth-child(n+2) {
        float: right;
    }

    .menu-link {
        text-decoration: none;
        text-transform: uppercase;
        font-size: 25px;
        color: black;
        float: right;
    }

    .menu-link:hover {
        text-decoration: underline;
    }
</style>

