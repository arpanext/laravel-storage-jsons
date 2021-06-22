<?php

return [

    'driver' => 'mongodb',
    'host' => env('MONGO_HOST', '127.0.0.1'),
    'port' => env('MONGO_PORT', 27017),
    'database' => env('MONGO_DATABASE', 'database'),
    'username' => env('MONGO_USERNAME', 'root'),
    'password' => env('MONGO_PASSWORD', 'password'),
    'options' => [
        'authentication_database' => env('MONGO_AUTHENTICATION_DATABASE', 'admin'), // required with Mongo 3+
    ],

];
