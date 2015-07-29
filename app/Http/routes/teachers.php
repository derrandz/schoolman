<?php

/*
|
|
|--------------------------------------------------------------------------
| Teachers Routes 
|--------------------------------------------------------------------------
|
|
*/

Route::group(['prefix' => 'schools'], function(){


//Index
Route::get('{school_id}/tenants/teachers',[

									'as'   => 'schools.teachers.index',
									'uses' => 'Controllers\SchoolsManagerController@getTeachersIndex'
	
												]);

//Create
Route::get('{school_id}/tenants/teachers/create',[

									'as'   => 'schools.teachers.create',
									'uses' => 'Controllers\SchoolsManagerController@getTeachersCreate'
	
												]);

//Show
Route::get('{school_id}/tenants/teachers/{id}',[

									'as'   => 'schools.teachers.show',
									'uses' => 'Controllers\SchoolsManagerController@getTeachersShow'
	
												]);

//Store
Route::post('{school_id}/tenants/teachers/store',[

									'as'   => 'schools.teachers.store',
									'uses' => 'Controllers\SchoolsManagerController@postTeachersStore'
	
												]);

//edit
Route::get('{school_id}/tenants/teachers/{id}/edit',[

									'as'   => 'schools.teachers.edit',
									'uses' => 'Controllers\SchoolsManagerController@getTeachersEdit'
	
												]);

//update
Route::put('{school_id}/tenants/teachers/{id}/update',[

									'as'   => 'schools.teachers.update',
									'uses' => 'Controllers\SchoolsManagerController@putTeachersUpdate'
	
												]);

//Delete
Route::get('{school_id}/tenants/teachers/{id}/delete',[

									'as'   => 'schools.teachers.delete',
									'uses' => 'Controllers\SchoolsManagerController@getTeachersDelete'
	
												]);

//Destroy
Route::delete('{school_id}/tenants/teachers/{id}/destroy',[

									'as'   => 'schools.teachers.destroy',
									'uses' => 'Controllers\SchoolsManagerController@deleteTeachersDestroy'
	
												]);

});