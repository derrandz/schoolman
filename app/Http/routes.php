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

Route::get('dashboard/index', ['as' => 'dashboard.index',
									'uses' => 'Controllers\DashboardController@getIndex']);

/*
|
|
|
|Schools Motor Routes
|
|
|
*/

//Index
Route::get('dashboard/schools',[

									'as'   => 'dashboard.schools.index',
									'uses' => 'Controllers\DashboardController@getSchoolsIndex'
	
												]);

//Create
Route::get('dashboard/schools/create',[

									'as'   => 'dashboard.schools.create',
									'uses' => 'Controllers\DashboardController@getSchoolsCreate'
	
												]);

//Show
Route::get('dashboard/schools/{id}',[

									'as'   => 'dashboard.schools.show',
									'uses' => 'Controllers\DashboardController@getSchoolsShow'
	
												]);

//Store
Route::post('dashboard/schools/store',[

									'as'   => 'dashboard.schools.store',
									'uses' => 'Controllers\DashboardController@postSchoolsStore'
	
												]);

//edit
Route::get('dashboard/schools/{id}/edit',[

									'as'   => 'dashboard.schools.edit',
									'uses' => 'Controllers\DashboardController@getSchoolsEdit'
	
												]);

//update
Route::put('dashboard/schools/{id}/update',[

									'as'   => 'dashboard.schools.update',
									'uses' => 'Controllers\DashboardController@putSchoolsUpdate'
	
												]);

//Delete
Route::get('dashboard/schools/{id}/delete',[

									'as'   => 'dashboard.schools.delete',
									'uses' => 'Controllers\DashboardController@getSchoolsDelete'
	
												]);

//Destroy
Route::delete('dashboard/schools/{id}/destroy',[

									'as'   => 'dashboard.schools.destroy',
									'uses' => 'Controllers\DashboardController@deleteSchoolsDestroy'
	
												]);


/*
|
|Users Motor Routes
|
*/

//Index
Route::get('dashboard/users',[
							
							'as' 	=> 'dashboard.users.index',
						  	'uses' 	=> 'Controllers\DashboardController@getUsersIndex'
						  	
						  	]);

//Show
Route::get('dashboard/users/{id}',[

							'as'   => 'dashboard.users.show',
							'uses' => 'Controllers\DashboardController@getUsersShow'
								]);

//Get
Route::get('dashboard/users/create',[
							
							'as' 	=> 'dashboard.users.create',
						  	'uses' 	=> 'Controllers\DashboardController@getUsersCreate
						  	
						  	']);

//Post
Route::post('dashboard/users/store',[
							
							'as' 	=> 'dashboard.users.store',
						  	'uses' 	=> 'Controllers\DashboardController@postUsersStore
						  	
						  	']);

//edit
Route::get('dashboard/users/{id}/edit',[

							'as'    => 'dashboard.users.edit',
						  	'uses' 	=> 'Controllers\DashboardController@getUsersEdit'
									]);

//update
Route::put('dashboard/users/{id}/update',[
							
							'as' 	=> 'dashboard.users.show',
						  	'uses' 	=> 'Controllers\DashboardController@putUsersUpdate
						  	
						  	']);

//Delete
Route::get('dashboard/users/{id}/delete',[
							
							'as' 	=> 'dashboard.users.delete',
						  	'uses' 	=> 'Controllers\DashboardController@getUsersDelete
						  	
						  	']);

//Destroy
Route::delete('dashboard/users/{id}/destroy',[
							
							'as' 	=> 'dashboard.users.destroy',
						  	'uses' 	=> 'Controllers\DashboardController@deleteUsersDes
						  	
						  	troy']);

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