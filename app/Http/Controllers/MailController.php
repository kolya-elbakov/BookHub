<?php

namespace App\Http\Controllers;
use App\Contracts\EmailInterface;
use App\Models\Application;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class MailController extends Controller
{
    private EmailInterface $emailService;

    public function __construct(EmailInterface $emailService)
    {
        $this->emailService = $emailService;
    }
    public function sendExchangeRequest(Application $application)
    {
        $this->emailService->sendExchangeRequest($application);

        echo "Пришло сообщение на почту";
    }
}
