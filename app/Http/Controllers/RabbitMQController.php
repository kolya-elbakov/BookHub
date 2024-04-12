<?php

namespace App\Http\Controllers;

use AMQPConnection;
use Illuminate\Http\Request;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQController extends Controller
{
    public function publishMessage()
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $channel = $connection->channel();
        $channel->queue_declare('hellooo', false, false, false, false);
        $msg = new AMQPMessage('Hello World!');
        $channel->basic_publish($msg, '', 'hellooo');

        echo " [x] Sent 'Hello World!'\n";

        $channel->close();
        $connection->close();
    }
}
