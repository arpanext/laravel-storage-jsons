<?php

namespace Arpanext\Storage\Jsons\App\Providers;

use Illuminate\Support\ServiceProvider;

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
                'namespace' => 'Arpanext\Storage\Jsons\App\Http\Controllers\Api\Storage\Jsons',
                'middleware' => [
                    //
                ],
                'as' => 'api.v1.storage.jsons.',
                'prefix' => '/api/v1/storage/jsons',
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
        //
    }
}
