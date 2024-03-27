<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class MailController extends Controller
{
    public function sendExchangeRequest(Application $application) {
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
