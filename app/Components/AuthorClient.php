<?php

namespace App\Components;

use Illuminate\Support\Facades\Http;

class AuthorClient
{
    public function searchAuthor(string $authorName): array
    {
        $response = Http::get('https://openlibrary.org/search/authors.json', [
            'q' => $authorName,
        ]);

        $data = $response->json();

        return !empty($data['docs']) ? $data['docs'][0] : [];
    }
}
