<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperClassesSP extends ServiceProvider
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
        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Capsule', 'Illuminate\Database\Capsule\Manager');                           
            $loader->alias('Container', 'Illuminate\Container\Container');                           
            $loader->alias('Dispatcher', 'Illuminate\Events\Dispatcher');                         
            $loader->alias('SessionsHelper','App\Helpers\Classes\SessionsHelper');
            $loader->alias('SchoolsFactory','App\Helpers\Classes\SchoolsFactory');
            $loader->alias('DatabaseConnection','App\Helpers\Classes\DatabaseConnection');
        });
    }
}
