<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$route_partials = [


		/*
		|
		| Controllers routes.
		|
		*/
		'global',


		/*
		|
		| Authentication And Registratin routes.
		|
		*/
		'auth',


		/*
		|
		|Schools Motor Routes
		|
		*/
		'internal_schools_routes',

		/*
		|
		|Users Motor Routes
		|
		*/
		'internal_users_routes',

		/*
		|
		|Teachers Motor Routes
		|
		*/
		'tenant_teachers_routes',
];


/*=======================
|
|
|
| Partials Loading
|
|
|
|
|
|
=========================*/


foreach($route_partials as $partial)
{
	$file = HTTP_path("routes/$partial.php");

	if ( ! file_exists($file))
    {
        $msg = "Route partial [{$partial}] not found.";
        throw new \Illuminate\Filesystem\FileNotFoundException($msg);
    }

    require_once $file;
}
