<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ContractsServiceProvider extends ServiceProvider
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
            $loader->alias('SchoolsInterface', 'App\Models\Internals\Contracts\SchoolsInterface');
            $loader->alias('SchoolsRepository', 'App\Models\Internals\Repositories\SchoolsRepository');
            $loader->alias('SchoolsRepoInterface', 'SchoolsRepository');

        });
    }
}
