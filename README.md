# Laravel Storage Jsons

## Requirements

### PHP MongoDB Extension

Install the PHP MongoDB Extension before installing the PHP Library for MongoDB. You can install the extension using PECL on the command line:

```shell
sudo pecl install mongodb
```

Finally, add the following line to your php.ini file:

```shell
extension=mongodb.so
```

## Installation

Install the package via composer:

```shell script
composer require arpanext/laravel-storage-jsons
```

Update the .env file:

```shell
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=password
DB_AUTHENTICATION_DATABASE=admin
```

```shell
php artisan route:list --compact
```

```shell
+----------+---------------------------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------+
| Method   | URI                                                                                   | Action                                                                                                   |
+----------+---------------------------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------+
| DELETE   | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/deleteMany | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\DeleteManyController |
| DELETE   | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/deleteOne  | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\DeleteOneController  |
| GET|HEAD | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/findMany   | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\FindManyController   |
| GET|HEAD | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/findOne    | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\FindOneController    |
| POST     | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/insertMany | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\InsertManyController |
| POST     | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/insertOne  | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\InsertOneController  |
| PUT      | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/replaceOne | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\ReplaceOneController |
| PATCH    | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/updateMany | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\UpdateManyController |
| PATCH    | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/updateOne  | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\UpdateOneController  |
| POST     | api/v1/storage/jsons/databases/{databaseName}/commands/execute                        | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Commands\ExecuteController       |
+----------+---------------------------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------+
```

Update the config file in config/vendor/arpanext/swagger/schemas/index.php:

```php
return [
    'default' => [
        'path' => 'vendor/arpanext/laravel-storage-jsons/src/App/Http/Controllers/Api',
    ],
];
```

[http://127.0.0.1:8000/swagger/consoles/default](http://127.0.0.1:8000/swagger/consoles/default)

## Testing

```shell
vendor/bin/phpunit vendor/arpanext/laravel-storage-jsons --configuration=vendor/arpanext/laravel-storage-jsons/phpunit.xml --do-not-cache-result --coverage-text --coverage-html=coverage/html/laravel-storage-jsons
```
