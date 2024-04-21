<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Http\Requests\ReviewRequest;
use App\Models\Message;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
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

        return redirect()->back();
    }

    public function deleteMessage(int $id)
    {
        $message = Message::find($id);
        $message->delete();

        return redirect()->back();
    }
}
