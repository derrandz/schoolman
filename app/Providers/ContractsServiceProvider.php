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
            $loader->alias('OrganismsInterface', 'App\Models\Internals\Contracts\OrganismsInterface');
            $loader->alias('OrganismsRepository', 'App\Models\Internals\Repositories\OrganismsRepository');
            $loader->alias('OrganismsRepoInterface', 'OrganismsRepository');

        });
    }
}
