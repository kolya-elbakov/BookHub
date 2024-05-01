<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<ul class="menu-list">
    <a class="menu-link" href="/books">Главная</a>
</ul>
<body>
<div class="chat-popup" id="myForm">
    <form action="{{ route('create-message', ['userId' => $userId]) }}" method="post" class="form-container">
        @csrf
        <h1>Chat with {{$user->name}} {{$user->surname}}</h1>

        <div class="chat-box">
            @foreach($messages as $message)
                <div class="message">
                    <p>{{ $message->sender_id == auth()->user()->id ? 'Me:' : $user->name . '' . $user->surname .':'}}</p>
                    <p>{{ $message->message }}</p>
                </div>
                @if ($message->sender_id == auth()->user()->id)
                    <a class="delete-btn" href="{{ route('delete-message', ['messageId' => $message->id]) }}">Удалить</a>
                    <a class="edit-btn" href="{{ route('edit-message', $message->id) }}">Редактировать</a>
                @endif
            @endforeach
        </div>

        <label for="message"><b>Message</b></label>
        @if ($errors->has('message'))
            <span class="text-danger">{{ $errors->first('message') }}</span>
        @endif
        <textarea placeholder="Type message.." name="message" id="message" required></textarea>
        <button type="submit" class="btn">Send</button>
    </form>
</div>
</body>
</html>

<style>
    body {
        font-family: sans-serif;
        margin: 0;
        padding: 20px;
    }

    .chat-popup {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
    }

    h1 {
        margin-top: 0;
        color: #333;
    }

    /* Стили меню */
    .menu-list {
        list-style: none;
        padding: 0;
        margin-bottom: 20px;
    }

    .menu-link {
        text-decoration: none;
        color: #007bff;
        padding: 5px 10px;
        border-radius: 4px;
        background-color: #e0e0e0;
    }

    /* Стили чата */
    .chat-box {
        height: 300px;
        overflow-y: scroll;
        padding: 10px;
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .message {
        margin-bottom: 15px;
        padding: 8px;
        border-radius: 4px;
    }

    .message p:first-child {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .message.you {
        background-color: #e0f2f1;
        text-align: right;
    }

    .message.other {
        background-color: #f5f5f5;
    }

    /* Стили формы */
    label {
        display: block;
        margin-bottom: 5px;
    }

    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 10px;
        resize: vertical;
    }

    .btn {
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .delete-btn {
        background-color: #dc3545; /* Красный цвет */
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 12px;
    }
    .edit-btn {
        background-color: #007bff; /* Красный цвет */
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 12px;
    }
</style>
