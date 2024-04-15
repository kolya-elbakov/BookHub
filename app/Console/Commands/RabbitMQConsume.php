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

        $rabbit = new RabbitMQService();

        $callback = function ($msg) {
            $data = $msg->body;
            $applicationId = (int) $data;

            $application = Application::find($applicationId);

            if ($application) {
                $emailService = new EmailService();
                $emailService->sendExchangeRequest($application);
                echo " [x] Email sent for application: {$application->id}\n";
            } else {
                echo " [!] Application not found for id: {$applicationId}\n";
            }
        };

        $rabbit->consume('email_queue', $callback);
    }
}
