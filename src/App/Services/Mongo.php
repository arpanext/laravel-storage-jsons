<?php

namespace Arpanext\Storage\Jsons\App\Services;

use MongoDB\Client;

class Mongo
{
    private $client;

    public function __construct()
    {
        $this->client = new Client(
            'mongodb://root:password@127.0.0.1:27017/admin?retryWrites=true&w=majority'
        );
    }

    public function getClient()
    {
        return $this->client;
    }
}
