<?php

namespace App\Services;

use App\Models\Application;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService extends AbstractRabbitMQService
{
    public function publish($application)
    {
        $messageData = ['application_id' => $application->id];

        $msg = new AMQPMessage(json_encode($messageData));
        $this->channel->basic_publish($msg, '', 'email_queue');

//       сервис не выдает сообщения так как переиспользуется
    }

    public function consume()
    {
        $callback = function ($msg) {
            $messageData = json_decode($msg->body, true);

            $emailService = new EmailService();

            $application = Application::find($messageData['application_id']);
            $emailService->sendExchangeRequest($application);

        };

        $this->channel->basic_consume('email_queue', '', false, true, false, false, $callback);

        while (count($this->channel->callbacks)) {
            $this->channel->wait();
        }

        $this->closeConnection();
    }
}
