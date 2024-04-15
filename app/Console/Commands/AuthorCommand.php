<?php

namespace App\Console\Commands;

use App\Components\AuthorClient;
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
//        $data = json_decode($response->getBody()->getContents(), true);
////        dd(json_decode($response->getBody()->getContents()));
//
//        foreach ($data as $item) {
////            if($key == 2)
//            dd($item['numFound']);
//        }
//    }
    public function handle()
    {
        $res = new AuthorClient();
        $response = $res->client->request('GET', 'authors.json?q=Rowling');
        $data = json_decode($response->getBody()->getContents(), true);

        foreach ($data as $item) {
            if (isset($item['numFound'])) {
                dd($item['numFound']); // Если 'numFound' существует, выводим его
            } else {
                dd('Key numFound not found in $item'); // Иначе выводим сообщение об отсутствии ключа
            }
        }
    }
}
