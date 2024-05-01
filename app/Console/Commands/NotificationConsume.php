<?php

namespace App\Console\Commands;

use App\Models\Message;
use App\Services\EmailService;
use App\Services\NotificationService;
use App\Services\RabbitMQService;
use Illuminate\Console\Command;

class NotificationConsume extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consume:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo "Waiting for messages. To exit press CTRL+C\n";

        $rabbit = new RabbitMQService();

        $callback = function ($msg) {
            $data = $msg->body;
            $messageId = (int) $data;

            $message = Message::find($messageId);

            if ($message) {
                $notificationService = new NotificationService();
                $notificationService->sendNotification($message);
                echo " [x] Email sent for message: {$message->id}\n";
            } else {
                echo " [!] Message not found for id: {$messageId}\n";
            }
        };

        $rabbit->consume('notification_queue', $callback);
    }
}
