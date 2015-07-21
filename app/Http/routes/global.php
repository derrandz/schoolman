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
