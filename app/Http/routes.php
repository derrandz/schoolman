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

// Controllers RESTful routes...
Route::resource('uploaded_files', 'UploadedFilesController');

// Authentication routes...
Route::get('auth/login', ['as' => 'auth.login',
						  'uses' => 'Auth\AuthController@getLogin']
						  );

Route::post('auth/login', ['as' => 'auth.login.post',
						  'uses' => 'Auth\AuthController@postLogin']
						  );

Route::get('auth/logout', ['as' => 'auth.logout',
						  'uses' => 'Auth\AuthController@getLogout']
						  );

Route::get('auth/dashboard', ['as' => 'auth.dashboard',
							  'uses' => 'Auth\AuthController@getDashboard']
							  );



// Registration routes...
Route::get('auth/register', ['as' => 'auth.sing_up',
						  'uses' => 'Auth\AuthController@getRegister']
						  );

Route::post('auth/register', ['as' => 'auth.sing_up',
						  'uses' => 'Auth\AuthController@postRegister']
						  );
