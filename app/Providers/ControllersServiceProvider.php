<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ControllersServiceProvider extends ServiceProvider
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
        $this->app->booting(function(){

            $loader = \Illuminate\Foundation\AliasLoader::getInstance();

            /*
            |**********************************************
            | Traits
            |**********************************************
            */

            $loader->alias('CRUDtrait', 'App\Http\Controllers\Traits\CRUDtrait');

            /*
            |**********************************************
            | Motors
            |**********************************************
            */

            $loader->alias('SchoolMotor', 'App\Http\Controllers\Motors\SchoolMotor');
            $loader->alias('UserMotor', 'App\Http\Controllers\Motors\UserMotor');


        });
    }
}
