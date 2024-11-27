<?php

namespace App\Components;

use GuzzleHttp\Client;

class ImportDataClient
{
    public $client;

    public function __construct() //curl error 6
    {
        $this->client = new Client([
            'base_url' => 'https://jsonplaceholder.typicode.com/',
            'timeout' => 7.0,
            'verify' => false
        ]);
    }
}