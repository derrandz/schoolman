<?php


/*
|--------------------------------------------------------------------------
| Partial Routes for Schools
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

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