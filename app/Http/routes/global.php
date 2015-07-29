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
Route::get('/', ['as' => 'root.auth.login',
						  'uses' => 'Controllers\Auth\AuthController@getLogin']
						  );

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

Route::group(['prefix' => 'admin'], function()
{
	Route::get('dashboard', ['as' => 'admin.index',
									'uses' => 'Controllers\DashboardController@getIndex']);

	Route::get('schoolmanager', ['as' => 'admin.schoolmanager',
										'uses' => 'Controllers\SchoolsManagerController@getDashboard']);

	Route::post('sidebar/setdatabase', ['as' => 'admin.sidebar.setdatabase',
										'uses' => 'Controllers\DashboardController@setDatabase']);
});
