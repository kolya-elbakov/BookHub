<?php

namespace App\Services;

use App\Contracts\MessageHandlerInterface;
use App\Models\Application;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    protected AMQPStreamConnection $connection;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
    }
    public function publish(string $queueName, $data)
    {
        $channel = $this->connection->channel();
        $channel->queue_declare($queueName, false, false, false, false);

        $msg = new AMQPMessage(json_encode($data));
        $channel->basic_publish($msg, '', $queueName);

        $channel->close();
//       сервис не выдает сообщения так как переиспользуется
    }

    public function consume(string $queueName, callable $callback)
    {
        $channel = $this->connection->channel();
        $channel->queue_declare($queueName, false, false, false, false);

        $channel->basic_consume($queueName, '', false, true, false, false, $callback);

        while (count($channel->callbacks)) {
            $channel->wait();
        }

        $channel->close();
        $this->connection->close();
    }
}
