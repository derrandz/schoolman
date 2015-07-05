<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DbConnectionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShare('setDbConnection', function($app, $db) {

            Config::set(" database.connections.{$db} ", [
                'driver' => 'mysql',
                'database' => $db,
                'prefix' => ''
                ])
            });

    }
}
