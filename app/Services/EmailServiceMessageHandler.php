<?php

namespace App\Services;

use App\Contracts\MessageHandlerInterface;
use App\Models\Application;
use Psr\Http\Message\MessageInterface;

class EmailServiceMessageHandler implements MessageHandlerInterface
{
    public function handle($messageData)
    {
        $emailService = new EmailService();

        $application = Application::find($messageData['application_id']);
        $emailService->sendExchangeRequest($application);
    }
}
