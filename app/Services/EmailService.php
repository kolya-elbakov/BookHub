<?php

namespace App\Services;

use App\Contracts\EmailInterface;
use App\Http\Controllers\MailController;
use App\Models\Application;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class EmailService implements EmailInterface
{
    public function sendExchangeRequest(Application $application) {
        $recipientUser = User::find($application->recipient_user_id);
        $senderUser = User::find($application->sender_user_id);
//        $data = array('recipientUser'=>$recipientUser,
//            'senderUser'=>$senderUser);

        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $channel = $connection->channel();

        $channel->queue_declare('email_queue', false, false, false, false);

        $messageData = [
            'to' => $recipientUser->email,
            'subject' => 'Заявка на обмен',
            'from' => $senderUser->email,
            'name' => $recipientUser->name . ' ' . $recipientUser->surname,
        ];

        $msg = new AMQPMessage(json_encode($messageData));

        $channel->basic_publish($msg, '', 'email_queue');

        $channel->close();
        $connection->close();

//        Mail::send(['text' => 'mail'], $data, function ($message) use ($recipientUser, $senderUser) {
//            $message->to($recipientUser->email, $recipientUser->name . ' ' . $recipientUser->surname)->subject('Заявка на обмен');
//            $message->from($senderUser->email, $senderUser->name . ' ' . $senderUser->surname);
//        });
    }
}
