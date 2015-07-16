<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ObjectsServiceProvider extends ServiceProvider
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
            //Tenants
            $loader->alias('File', 'App\Models\Objects\Tenants\File');
            $loader->alias('Student', 'App\Models\Objects\Tenants\Student');             
            $loader->alias('Teacher', 'App\Models\Objects\Tenants\Teacher');             
            $loader->alias('Class','App\Models\Objects\Tenants\Class');
            $loader->alias('Exam','App\Models\Objects\Tenants\Exam');
            $loader->alias('Course','App\Models\Objects\Tenants\Course');
            $loader->alias('Result','App\Models\Objects\Tenants\Result');

            //Internals
            $loader->alias('User', 'App\Models\Internals\Objects\User');
            $loader->alias('School', 'App\Models\Internals\Objects\School'); 
            $loader->alias('Database', 'App\Models\Internals\Objects\Database'); 
            $loader->alias('Permission','App\Models\Internals\Objects\Psudoermission');                                   
            $loader->alias('Role','App\Models\Internals\Objects\Role');      

            $loader->alias('App\User','User'); //redirection to the right alias

        });
    }
}
