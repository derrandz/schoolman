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

            $loader->alias('Motor', 'App\Http\Controllers\Motors\Motor');

            $loader->alias('SchoolMotor', 'App\Http\Controllers\Motors\Internals\SchoolMotor');
            $loader->alias('UserMotor', 'App\Http\Controllers\Motors\Internals\UserMotor');
            $loader->alias('TeacherMotor', 'App\Http\Controllers\Motors\Tenants\TeacherMotor');
            $loader->alias('StudentMotor', 'App\Http\Controllers\Motors\Tenants\StudentMotor');
            $loader->alias('ClassMotor', 'App\Http\Controllers\Motors\Tenants\ClassMotor');
            $loader->alias('CourseMotor', 'App\Http\Controllers\Motors\Tenants\CourseMotor');
            $loader->alias('ExamMotor', 'App\Http\Controllers\Motors\Tenants\ExamMotor');
            $loader->alias('ResultMotor', 'App\Http\Controllers\Motors\Tenants\ClassMotor');


        });
    }
}
