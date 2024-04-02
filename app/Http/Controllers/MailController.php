<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class MailController extends Controller
{
    public function sendExchangeRequest(Application $application)
    {
        EmailService::sendExchangeRequest($application);

        echo "Пришло сообщение на почту";
    }
}
