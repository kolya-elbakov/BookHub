<form action="{{ route('edit-message', $message->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="message">Сообщение:</label>
    <input type="text" id="message" name="message" value="{{$message->message}}">
    <button type="submit">Сохранить</button>
</form>

<a href="{{route('chat', $message->recipient_id)}}">Назад</a>

