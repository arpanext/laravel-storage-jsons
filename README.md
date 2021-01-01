# Laravel Storage Jsons

## Installation

Install the package via composer:

```shell script
composer require arpanext/laravel-storage-jsons
```

```shell
php artisan route:list
```

```shell
+--------+----------+---------------------------------------------------------------------------------------+-------------------------------------------------------+----------------------------------------------------------------------------------------------------------+------------+
| Domain | Method   | URI                                                                                   | Name                                                  | Action                                                                                                   | Middleware |
+--------+----------+---------------------------------------------------------------------------------------+-------------------------------------------------------+----------------------------------------------------------------------------------------------------------+------------+
|        | GET|HEAD | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/findMany   | api.v1.storage.jsons.databases.collections.findMany   | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\FindManyController   |            |
|        | GET|HEAD | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/findOne    | api.v1.storage.jsons.databases.collections.findOne    | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\FindOneController    |            |
|        | POST     | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/insertMany | api.v1.storage.jsons.databases.collections.insertMany | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\InsertManyController |            |
|        | POST     | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/insertOne  | api.v1.storage.jsons.databases.collections.insertOne  | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\InsertOneController  |            |
|        | PUT      | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/replaceOne | api.v1.storage.jsons.databases.collections.replaceOne | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\ReplaceOneController |            |
|        | PATCH    | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/updateMany | api.v1.storage.jsons.databases.collections.updateMany | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\UpdateManyController |            |
|        | PATCH    | api/v1/storage/jsons/databases/{databaseName}/collections/{collectionName}/updateOne  | api.v1.storage.jsons.databases.collections.updateOne  | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Collections\UpdateOneController  |            |
|        | POST     | api/v1/storage/jsons/databases/{databaseName}/commands/execute                        | api.v1.storage.jsons.databases.commands.execute       | Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons\Databases\Commands\ExecuteController       |            |
+--------+----------+---------------------------------------------------------------------------------------+-------------------------------------------------------+----------------------------------------------------------------------------------------------------------+------------+

```

Update the config file in config/vendor/arpanext/swagger/schemas/index.php:

```php
return [
    'jsons' => [
        'path' => 'vendor/arpanext/laravel-storage-jsons/src/App/Http/Controllers/Api',
    ],
];
```

[http://127.0.0.1:8000/swagger/consoles](http://127.0.0.1:8000/swagger/consoles)

## Testing

```shell
vendor/bin/phpunit vendor/arpanext/laravel-storage-jsons --configuration=vendor/arpanext/laravel-storage-jsons/phpunit.xml --do-not-cache-result --coverage-text --coverage-html=coverage/html/laravel-storage-jsons
```
