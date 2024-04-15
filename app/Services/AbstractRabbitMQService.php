<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;

abstract class AbstractRabbitMQService
{
    protected $connection;
    protected $channel;

    public function __construct()
    {
        $this->setupChannel();
    }
    protected function setupChannel()
    {
        $this->connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $this->channel = $this->connection->channel();
        $this->channel->queue_declare('email_queue', false, false, false, false);
    }

    public function closeConnection()
    {
        $this->channel->close();
        $this->connection->close();
    }
}
