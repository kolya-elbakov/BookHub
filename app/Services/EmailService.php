<?php

namespace App\Services;

use App\Models\Application;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public static function sendExchangeRequest(Application $application) {
        $recipientUser = User::find($application->recipient_user_id);
        $senderUser = User::find($application->sender_user_id);
        $data = array('recipientUser'=>$recipientUser,
            'senderUser'=>$senderUser);

        Mail::send(['text'=>'mail'], $data, function($message) use ($recipientUser, $senderUser) {
            $message->to($recipientUser->email, $recipientUser->name . ' ' . $recipientUser->surname)->subject
            ('Заявка на обмен');
            $message->from($senderUser->email,$senderUser->name . ' ' . $senderUser->surname);
        });
        echo "Пришло сообщение на почту";
    }
}
