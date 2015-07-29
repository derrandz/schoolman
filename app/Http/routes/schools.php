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
Route::group(['prefix' => 'admin/schools'], function(){


//Index
Route::get('index',[

									'as'   => 'admin.schools.index',
									'uses' => 'Controllers\DashboardController@getSchoolsIndex'
	
												]);

//Create
Route::get('create',[

									'as'   => 'admin.schools.create',
									'uses' => 'Controllers\DashboardController@getSchoolsCreate'
	
												]);

//Show
Route::get('{id}',[

									'as'   => 'admin.schools.show',
									'uses' => 'Controllers\DashboardController@getSchoolsShow'
	
												]);

//Store
Route::post('store',[

									'as'   => 'admin.schools.store',
									'uses' => 'Controllers\DashboardController@postSchoolsStore'
	
												]);

//edit
Route::get('{id}/edit',[

									'as'   => 'admin.schools.edit',
									'uses' => 'Controllers\DashboardController@getSchoolsEdit'
	
												]);

//update
Route::put('{id}/update',[

									'as'   => 'admin.schools.update',
									'uses' => 'Controllers\DashboardController@putSchoolsUpdate'
	
												]);

//Delete
Route::get('{id}/delete',[

									'as'   => 'admin.schools.delete',
									'uses' => 'Controllers\DashboardController@getSchoolsDelete'
	
												]);

//Destroy
Route::delete('{id}/destroy',[

									'as'   => 'admin.schools.destroy',
									'uses' => 'Controllers\DashboardController@deleteSchoolsDestroy'
	
												]);

});