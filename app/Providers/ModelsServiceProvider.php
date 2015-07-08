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
            $loader->alias('File', 'App\Http\Models\File');
            $loader->alias('User', 'App\Http\Models\User');
            $loader->alias('App\User','User');
            $loader->alias('Student', 'App\Http\Models\Student');             
            $loader->alias('Teacher', 'App\Http\Models\Teacher');             
            $loader->alias('OrganismSetup', 'App\Http\Models\OrganismSetup');
            $loader->alias('Organism', 'App\Http\Models\Organism'); 
            $loader->alias('Database', 'App\Http\Models\Database');                           
            $loader->alias('DatabaseConnection', 'App\Http\Models\DatabaseConnection');                           
            $loader->alias('Capsule', 'Illuminate\Database\Capsule\Manager');                           
            $loader->alias('Container', 'Illuminate\Container\Container');                           
            $loader->alias('Dispatcher', 'Illuminate\Events\Dispatcher');                           

        });
    }

/*
* Comments
*
*
*
* If you which to change anything, pleaser remember that you can simply create more 
* aliases via the method up above, or you can affect it directly in config/app.
* After any changes to the modesl and classes, run `composer dump-autoload.
*
*
*/
}