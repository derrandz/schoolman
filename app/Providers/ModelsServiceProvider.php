<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModelsServiceProvider extends ServiceProvider
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
            $loader->alias('UploadedFile', 'App\Http\Models\UploadedFile');
            $loader->alias('User', 'App\Http\Models\User');
            $loader->alias('App\User','User'); /*
            *
            * This one is a simple hack to correct all the App/User old paths, since Laravel ships with built-in User model, and I have changed the directory for it.

            * This Idea came in when I was implementing the built-in authentication system, as I *faced an error saying 'App/User' class not found.
            *
            *If you which to change anything, pleaser remember that you can simply create more *aliases via the method up above, or you can affect it directly in config/app.
            *
            * After any changes to the modesl and classes, run `composer dump-autoload`
            *
            */
            $loader->alias('Student', 'App\Http\Models\Student');

        });
    }
}