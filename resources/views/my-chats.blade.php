<!DOCTYPE html>
<html>
<head>
    <title>My Chats</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>My Chats</h1>
<ul class="chat-list">
    @foreach($chatPartners as $user)
        <li>
            <a href="{{route('chat', $user->id)}}">
                {{ $user->name }} {{ $user->surname }}
            </a>
        </li>
    @endforeach
</ul>
</body>
</html>

<style>
    .chat-list {
        list-style: none;
        padding: 0;
    }

    .chat-list li {
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .chat-list a {
        text-decoration: none;
        color: #333;
    }
</style>
