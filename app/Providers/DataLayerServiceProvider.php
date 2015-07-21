<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DataLayerServiceProvider extends ServiceProvider
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
| Internals
|**********************************************
*/

        /*
        |**********************************************
        |Internals
        ||
        |||
        |||| Contracts & Repositories
        |||
        ||
        |**********************************************
        */

            $loader->alias('CRUDInterface', 'App\DataLayer\Internals\Contracts\CRUDInterface');

            $loader->alias('SchoolsRepository', 'App\DataLayer\Internals\Repositories\SchoolsRepository');
            $loader->alias('SchoolsRepoInterface', 'SchoolsRepository');
       
            $loader->alias('UsersRepository', 'App\DataLayer\Internals\Repositories\UsersRepository');
            $loader->alias('UsersRepoInterface', 'UsersRepository');

            $loader->alias('DatabasesInstancesRepository', 'App\DataLayer\Internals\Repositories\DatabasesInstancesRepository');
            $loader->alias('DatabasesInstancesRepoInterface', 'DatabasesInstancesRepository');

            $loader->alias('RolesRepository', 'App\DataLayer\Internals\Repositories\RolesRepository');
            $loader->alias('RolesRepoInterface', 'RolesRepository');       
        /*
        |**********************************************
        |Internals
        ||
        |||
        |||| Objects
        |||
        ||
        |**********************************************
        */


            $loader->alias('User', 'App\DataLayer\Internals\Objects\User');
            $loader->alias('School', 'App\DataLayer\Internals\Objects\School'); 
            $loader->alias('Database', 'App\DataLayer\Internals\Objects\Database'); 
            $loader->alias('Permission','App\DataLayer\Internals\Objects\Permission');                                   
            $loader->alias('Role','App\DataLayer\Internals\Objects\Role');      
            $loader->alias('App\Http\Models\Role','Role');      

            $loader->alias('App\User','User'); //*Notes

/**
*
* Notes: Instead of changing 'use App\User' in every file that uses it, I changed it this way.
*        It's but a simple trick. Now anytime there is 'use App\User', the framework will look up 'App\User'
*        to find that it is only an alias for 'User', the class object we want.
*/

/*
|**********************************************
| Tenants
|**********************************************
*/


        /*
        |**********************************************
        |Tenants
        ||
        |||
        |||| Contracts & Repositories
        |||
        ||
        |**********************************************
        */
                    

        /*
        |**********************************************
        |Tenants
        ||
        |||
        |||| Objects
        |||
        ||
        |**********************************************
        */

                $loader->alias('File', 'App\DataLayer\Objects\Tenants\File');
                $loader->alias('Student', 'App\DataLayer\Objects\Tenants\Student');             
                $loader->alias('Teacher', 'App\DataLayer\Objects\Tenants\Teacher');             
                $loader->alias('Class','App\DataLayer\Objects\Tenants\Class');
                $loader->alias('Exam','App\DataLayer\Objects\Tenants\Exam');
                $loader->alias('Course','App\DataLayer\Objects\Tenants\Course');
                $loader->alias('Result','App\DataLayer\Objects\Tenants\Result');
        });
    }
}