<?php

namespace App\Services;

use App\Models\Application;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class NotificationService
{
    public function sendNotification(Message $message) {
        $recipientUser = User::find($message->recipient_id);
        $senderUser = User::find($message->sender_id);

        Mail::send('notification', ['recipientUser' => $recipientUser, 'senderUser' => $senderUser, 'message' => $message], function ($message) use ($recipientUser, $senderUser) {
            $message->to($recipientUser->email, $recipientUser->name . ' ' . $recipientUser->surname)->subject('Уведомление');
            $message->from($senderUser->email, $senderUser->name . ' ' . $senderUser->surname);
        });
    }
}
