<?php

namespace Arpanext\Storage\Jsons\App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Arpanext\Storage\Jsons\App\Services\Mongo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->router->group(
            [
                'namespace' => 'Arpanext\Storage\Jsons\App\Http\Controllers\Api',
                'middleware' => [
                    //
                ],
                'as' => 'api.v1.',
                'prefix' => '/api/v1',
            ],
            function () {
                require __DIR__ . '/../../routes/api.php';
            }
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Config::get('database.connections.mongo') ?: $this->mergeConfigFrom(__DIR__ . '/../../config/database/connections/mongo.php', 'database.connections.mongo');

        $this->app->bind('Mongo', function () {
            return new Mongo();
        });
    }
}
