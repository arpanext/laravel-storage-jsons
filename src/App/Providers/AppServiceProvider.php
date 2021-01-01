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
        //
    }
}
