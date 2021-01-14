<?php

namespace Arpanext\Storage\Jsons\App\Services;

use MongoDB\Client;
use Illuminate\Support\Facades\Config;

class Mongo
{
    private $client;

    public function __construct()
    {
        $this->host = Config::get('database.connections.mongodb.host');
        $this->port = Config::get('database.connections.mongodb.port');
        $this->username = Config::get('database.connections.mongodb.username');
        $this->password = Config::get('database.connections.mongodb.password');
        $this->authentication_database = Config::get('database.connections.mongodb.options.authentication_database');

        $this->client = new Client(
            "mongodb://{$this->username}:{$this->password}@{$this->host}:{$this->port}/{$this->authentication_database}?retryWrites=true&w=majority"
        );
    }

    public function getClient()
    {
        return $this->client;
    }
}
