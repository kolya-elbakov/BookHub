<?php

namespace App\Services;

use App\Contracts\EmailInterface;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    public function publish($application)
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $channel = $connection->channel();
        $channel->queue_declare('email_queue', false, false, false, false);

        $messageData = [
            'application_id' => $application->id,
        ];

        $msg = new AMQPMessage(json_encode($messageData));
        $channel->basic_publish($msg, '', 'email_queue');

        echo "[x] Sent email notification for application {$application->id}\n";

        $channel->close();
        $connection->close();
    }
}
