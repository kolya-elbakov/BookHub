<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use App\Services\RabbitMQService;

class MessageController extends Controller
{
    private RabbitMQService $rabbitMQService;

    public function __construct(RabbitMQService $rabbitMQService)
    {
        $this->rabbitMQService = $rabbitMQService;
    }

    public function getChatForm(int $id)
    {
        $user = User::find($id);
        $messages = Message::where(function ($query) use ($id) {
            $query->where('sender_id', auth()->user()->id)
                ->where('recipient_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('sender_id', $id)
                ->where('recipient_id', auth()->user()->id);
        })->orderBy('created_at', 'asc')->get();

        return view('chat', ['messages' => $messages, 'userId' => $id, 'user' => $user]);
    }

    public function createMessage(MessageRequest $request, int $id)
    {
        $validated = $request->validated();

        $message = new Message();
        $message->sender_id = auth()->user()->id;
        $message->recipient_id = $id;
        $message->message = $validated['message'];
        $message->save();

        if($message){
            $this->rabbitMQService->publish('notification_queue', $message->id);
        }

        return redirect()->back();
    }

    public function deleteMessage(int $id)
    {
        $message = Message::find($id);
        $message->delete();

        return redirect()->back();
    }

    public function getMyChats()
    {
        $userId = auth()->user()->id;
        $chats = Message::select('sender_id', 'recipient_id')
            ->where('sender_id', $userId)
            ->orWhere('recipient_id', $userId)
            ->distinct()
            ->get();

        $chatPartners = [];
        $addedPartners = [];

        foreach ($chats as $chat) {
            $partnerId = $chat->sender_id == $userId ? $chat->recipient_id : $chat->sender_id;

            if (!in_array($partnerId, $addedPartners)) {
                $user = User::find($partnerId);
                $chatPartners[] = $user;
                $addedPartners[] = $partnerId;
            }
        }

        return view('my-chats', ['chatPartners' => $chatPartners]);
    }
}
