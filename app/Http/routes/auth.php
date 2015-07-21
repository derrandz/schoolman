<?php

/*
|
|
|--------------------------------------------------------------------------
| Authentication and Registration Routes 
|--------------------------------------------------------------------------
|
|
*/


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