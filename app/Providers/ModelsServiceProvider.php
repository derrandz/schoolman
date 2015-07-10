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
            $loader->alias('File', 'App\Http\Models\Tenants\File');
            $loader->alias('User', 'App\Http\Models\Internals\User');
            $loader->alias('App\User','User'); //redirection to the right alias
            $loader->alias('Student', 'App\Http\Models\Tenants\Student');             
            $loader->alias('Teacher', 'App\Http\Models\Tenants\Teacher');             
            $loader->alias('OrganismSetup', 'App\Http\Models\OrganismSetup');
            $loader->alias('Organism', 'App\Http\Models\Internals\Organism'); 
            $loader->alias('Database', 'App\Http\Models\Internals\Database');                           
            $loader->alias('DatabaseConnection', 'App\Http\Models\DatabaseConnection');                           
            $loader->alias('Capsule', 'Illuminate\Database\Capsule\Manager');                           
            $loader->alias('Container', 'Illuminate\Container\Container');                           
            $loader->alias('Dispatcher', 'Illuminate\Events\Dispatcher');  
            $loader->alias('Permission','App\Http\Models\Internals\Permission');                         
            $loader->alias('PermissionGroup','App\Http\Models\Internals\PermissionGroup');                         
            $loader->alias('Role','App\Http\Models\Internals\Role');                         
            $loader->alias('App\Http\Models\Role','Role');                         

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
* Hamza Ouaghad
*/
}