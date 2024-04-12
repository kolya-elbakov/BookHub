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
    public function handle()
    {
        $res = new AuthorClient();
        $response = $res->client->request('GET', 'authors.json?q=J.k. Rowling');
        $data = json_decode($response->getBody()->getContents(), true);
//        dd(json_decode($response->getBody()->getContents()));

        foreach ($data->docs as $key => $item) {
            if($key == 2)
            dd($item->top_work);
        }
    }
}
