<?php

namespace App\Contracts;

use App\Models\Application;

interface EmailInterface
{
    public function sendExchangeRequest(Application $application);
}
