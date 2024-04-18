<?php

namespace App\Components;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class AuthorClient
{
    public function searchAuthor(string $authorName): array
    {
        $response = Http::get('https://openlibrary.org/search/authors.json', [
            'q' => $authorName,
        ]);

        return $response->json();
    }
}
