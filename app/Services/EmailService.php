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
    protected RabbitMQService $rabbitMQService;

    public function __construct(RabbitMQService $rabbitMQService)
    {
        $this->rabbitMQService = $rabbitMQService;
    }
    public function sendExchangeRequest(Application $application) {
        $recipientUser = User::find($application->recipient_user_id);
        $senderUser = User::find($application->sender_user_id);

        Mail::send('mail', ['recipientUser' => $recipientUser, 'senderUser' => $senderUser, 'application' => $application], function ($message) use ($recipientUser, $senderUser) {
            $message->to($recipientUser->email, $recipientUser->name . ' ' . $recipientUser->surname)->subject('Заявка на обмен');
            $message->from($senderUser->email, $senderUser->name . ' ' . $senderUser->surname);
        });

        $this->rabbitMQService->publish($application);
    }
}
