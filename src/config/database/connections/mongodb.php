<?php

return [

    'driver' => 'mongodb',
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', 27017),
    'database' => env('DB_DATABASE', 'database'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', 'password'),
    'options' => [
        'authentication_database' => env('DB_AUTHENTICATION_DATABASE', 'admin'), // required with Mongo 3+
    ],

];
