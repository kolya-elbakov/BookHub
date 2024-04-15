<?php

namespace App\Console\Commands;

use App\Contracts\EmailInterface;
use App\Models\Application;
use App\Services\EmailService;
use App\Services\EmailServiceMessageHandler;
use App\Services\RabbitMQService;
use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQConsume extends Command
{
    protected $signature = 'consume:emails';
    protected $description = 'Consume email queue messages';

    public function handle()
    {
        echo "Waiting for messages. To exit press CTRL+C\n";

        $messageHandler = new EmailServiceMessageHandler();
        $rabbit = new RabbitMQService($messageHandler);
        $rabbit->consume();
    }
}
