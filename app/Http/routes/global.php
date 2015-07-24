<?php

/*
|
|
|--------------------------------------------------------------------------
| Global Routes 
|--------------------------------------------------------------------------
|
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

Route::get('dashboard/index', ['as' => 'dashboard.index',
									'uses' => 'Controllers\DashboardController@getIndex']);

Route::post('dashboard/sidebar/setdatabase', [

									'as'   => 'dashboard.sidebar.setdatabase',
									'uses' => 'Controllers\DashboardController@setDatabase'
										   
											]);
