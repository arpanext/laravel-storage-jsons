# Laravel Mongo Shell Api

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
composer require arpanext/laravel-mongo-shell-api
```

Update the .env file:

```shell
MONGO_CONNECTION=mongo
MONGO_HOST=127.0.0.1
MONGO_PORT=27017
MONGO_DATABASE=database
MONGO_USERNAME=root
MONGO_PASSWORD=password
MONGO_AUTHENTICATION_DATABASE=admin
```

```shell
php artisan route:list --compact
```

```shell
+----------+-------------------------------------------------------------------------------------+------------------------------------------------------------------------------------------------------+
| Method   | URI                                                                                 | Action                                                                                               |
+----------+-------------------------------------------------------------------------------------+------------------------------------------------------------------------------------------------------+
| GET|HEAD | api/v1/mongo/shell/databases/list                                                   | Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\ListController                   |
| DELETE   | api/v1/mongo/shell/databases/{databaseName}/collections/{collectionName}/deleteMany | Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Collections\DeleteManyController |
| DELETE   | api/v1/mongo/shell/databases/{databaseName}/collections/{collectionName}/deleteOne  | Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Collections\DeleteOneController  |
| GET|HEAD | api/v1/mongo/shell/databases/{databaseName}/collections/{collectionName}/findMany   | Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Collections\FindManyController   |
| GET|HEAD | api/v1/mongo/shell/databases/{databaseName}/collections/{collectionName}/findOne    | Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Collections\FindOneController    |
| POST     | api/v1/mongo/shell/databases/{databaseName}/collections/{collectionName}/insertMany | Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Collections\InsertManyController |
| POST     | api/v1/mongo/shell/databases/{databaseName}/collections/{collectionName}/insertOne  | Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Collections\InsertOneController  |
| PUT      | api/v1/mongo/shell/databases/{databaseName}/collections/{collectionName}/replaceOne | Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Collections\ReplaceOneController |
| PATCH    | api/v1/mongo/shell/databases/{databaseName}/collections/{collectionName}/updateMany | Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Collections\UpdateManyController |
| PATCH    | api/v1/mongo/shell/databases/{databaseName}/collections/{collectionName}/updateOne  | Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Collections\UpdateOneController  |
| POST     | api/v1/mongo/shell/databases/{databaseName}/commands/execute                        | Arpanext\Mongo\Shell\App\Http\Controllers\Api\Mongo\Shell\Databases\Commands\ExecuteController       |
+----------+---------------------------------------------------------------------------------------+----------------------------------------------------------------------------------------------------+
```

Update the config file in config/vendor/arpanext/swagger/schemas/index.php:

```php
return [
    'default' => [
        'path' => base_path('vendor/arpanext/laravel-mongo-shell-api/src/App/Http/Controllers/Api'),
    ],
];
```

[http://127.0.0.1:8000/swagger/consoles/default](http://127.0.0.1:8000/swagger/consoles/default)

## Testing

```shell
vendor/bin/phpunit vendor/arpanext/laravel-mongo-shell-api --configuration=vendor/arpanext/laravel-mongo-shell-api/phpunit.xml --do-not-cache-result --coverage-text --coverage-html=coverage/html/laravel-mongo-shell-api
```
