<?php

namespace App\Console\Commands;

use App\Contracts\EmailInterface;
use App\Models\Application;
use App\Services\EmailService;
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

        $rabbit = new RabbitMQService();
        $rabbit->consume();
    }
}
