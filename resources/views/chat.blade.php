<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<ul class="menu-list">
    <a class="menu-link" href="{{route('user-profile', $user->id)}}">Назад</a>
</ul>
<body>
<div class="chat-popup" id="myForm">
    <form action="{{ route('create-message', ['id' => $userId]) }}" method="post" class="form-container">
        @csrf
        <h1>Chat</h1>

        <div class="chat-box">
            @foreach($messages as $message)
                <div class="message">
                    <p>{{ $message->sender_id == auth()->user()->id ? 'You:' : 'Recipient:' }}</p>
                    <p>{{ $message->message }}</p>
                </div>
            @endforeach
        </div>

        <label for="message"><b>Message</b></label>
        <textarea placeholder="Type message.." name="message" id="message" required></textarea>
        <button type="submit" class="btn">Send</button>
    </form>
</div>
</body>
</html>

<style>
    {box-sizing: border-box;}

    /* Button used to open the chat form - fixed at the bottom of the page */
    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
    }

    /* The popup chat - hidden by default */
    .form-popup {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
    }

    /* Full-width textarea */
    .form-container textarea {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
        resize: none;
        min-height: 200px;
    }

    /* When the textarea gets focus, do something */
    .form-container textarea:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
        opacity: 1;
    }
</style>
