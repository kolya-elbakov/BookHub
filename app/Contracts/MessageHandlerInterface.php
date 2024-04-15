<?php

namespace App\Contracts;

interface MessageHandlerInterface
{
    public function handle($messageData);
}
