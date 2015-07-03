<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TwitterBootstrapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
                    vendor_path('twitter/bootstrap/') => public_path('vendor/twitter-bootstrap'),
        ], 'public');
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
