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
// root route...
Route::get('/', function () {
    return view('welcome');
});

Route::get('/error', function () {
	return view('errors.503');
});

/*
|
|
| Controllers routes.
|
|
*/

Route::get('dashboard/index', ['as' => 'schools.index',
									'uses' => 'Controllers\DashboardController@getIndex']);

Route::get('schools',['as' => 'schools.index',
						  'uses' => 'Controllers\DashboardController@getSchoolsIndex']);

Route::get('schools/{id}',['as' => 'schools.show',
						  'uses' => 'Controllers\DashboardController@getSchoolsShow($id)']);

Route::get('schools',['as' => 'schools.destroy',
						  'uses' => 'Controllers\DashboardController@getSchoolsIndex']);



Route::get('users',['as' => 'users.index',
						  'uses' => 'Controllers\DashboardController@getUsersIndex']);

Route::get('users/{id}',['as' => 'users.show',
						  'uses' => 'Controllers\DashboardController@getUsersShow($id)']);

Route::get('users',['as' => 'users.destroy',
						  'uses' => 'Controllers\DashboardController@getUsersIndex']);


/*
|
|
| Authentication routes.
|
|
*/
Route::get('auth/login', ['as' => 'auth.login',
						  'uses' => 'Controllers\Auth\AuthController@getLogin']
						  );

Route::post('auth/login', ['as' => 'auth.login.post',
						  'uses' => 'Controllers\Auth\AuthController@postLogin']
						  );

Route::get('auth/logout', ['as' => 'auth.logout',
						  'uses' => 'Controllers\Auth\AuthController@getLogout']
						  );

Route::get('/dashboard', ['as' => 'auth.dashboard',
							  'uses' => 'Controllers\Auth\AuthController@getDashboard']
							  );


/*
|
|
| Registration routes.
|
|
*/
Route::get('auth/register', ['as' => 'auth.sing_up',
						  'uses' => 'Controllers\Auth\AuthController@getRegister']
						  );

Route::post('auth/register', ['as' => 'auth.sing_up',
						  'uses' => 'Controllers\Auth\AuthController@postRegister']
						  );