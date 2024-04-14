<?php

namespace App\Console\Commands;

use App\Contracts\EmailInterface;
use App\Models\Application;
use App\Services\EmailService;
use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQConsume extends Command
{
    protected $signature = 'consume:emails';
    protected $description = 'Consume email queue messages';

    public function handle()
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $channel = $connection->channel();
        $channel->queue_declare('email_queue', false, false, false, false);

        echo "Waiting for messages. To exit press CTRL+C\n";

        $emailService = new EmailService();

        $callback = function ($msg) use ($emailService) {
            $messageData = json_decode($msg->body, true);

            $application = Application::find($messageData['application_id']);
            $emailService->sendExchangeRequest($application);

            echo " [x] Email sent for application: {$application->id}\n";
        };

        $channel->basic_consume('email_queue', '', false, true, false, false, $callback);

        while (count($channel->callbacks)) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }
}
