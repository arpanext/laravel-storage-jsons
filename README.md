# Laravel Storage Jsons

## Installation

Install the package via composer:

```shell script
composer require arpanext/laravel-storage-jsons
```

```shell
php artisan route:list --compact
```

```shell
+----------+---------------------------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------+
| Method   | URI                                                                                   | Action                                                                                                   |
+----------+---------------------------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------+
| GET|HEAD | /                                                                                     | Closure                                                                                                  |
| GET|HEAD | api/user                                                                              | Closure                                                                                                  |
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
