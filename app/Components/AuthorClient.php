<?php

namespace App\Components;

use GuzzleHttp\Client;

class AuthorClient
{
    public Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://openlibrary.org/search/',
            'timeout'  => 2.0,
            'verify' => false
        ]);
    }

}
