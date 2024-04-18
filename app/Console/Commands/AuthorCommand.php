<?php

namespace App\Console\Commands;

use App\Components\AuthorClient;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class AuthorCommand extends Command
{
    protected $signature = 'app:author';

    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
//    public function handle()
//    {
//        $res = new AuthorClient();
//        $response = $res->client->request('GET', 'authors.json?q=Rowling');
////        dd(json_decode($response->getBody()->getContents(), true));
//
////        foreach ($data as $item) {
////            if (isset($item['numFound'])) {
////                dd($item['numFound']); // Если 'numFound' существует, выводим его
////            } else {
////                dd('Key numFound not found in $item'); // Иначе выводим сообщение об отсутствии ключа
////            }
////        }
//    }
    public function handle()
    {
        $client = new Client(['base_uri' => 'https://openlibrary.org']);

        $response = $client->request('GET', '/search/authors.json', [
            'query' => ['q' => 'Rowling']
        ]);

        $responseData = json_decode($response->getBody()->getContents(), true);

        if (isset($responseData['docs']) && count($responseData['docs']) > 0) {
            $author = $responseData['docs'][0];
            $name = $author['name'];
            $birthDate = $author['birth_date'];
            $topWork = $author['top_work'];

            $this->info("Author: $name, Birth Date: $birthDate, Top Work: $topWork");
        } else {
            $this->error("Author not found.");
        }
    }
}
