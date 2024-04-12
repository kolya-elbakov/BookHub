<?php

namespace App\Services;

use App\Contracts\EmailInterface;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    protected $connection;
    protected $channel;
    private EmailInterface $emailService;

    public function __construct(EmailInterface $emailService)
    {
        $this->emailService = $emailService;
        $this->connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $this->channel = $this->connection->channel();
    }

    public function sendMessage($queueName, $application) {
        $this->channel->queue_declare($queueName, false, true, false, false);
        $this->emailService->sendExchangeRequest($application);
        $this->channel->basic_publish(new AMQPMessage(json_encode($application)), '', $queueName);
    }
}
