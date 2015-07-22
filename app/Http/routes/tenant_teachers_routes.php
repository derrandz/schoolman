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


//Index
Route::get('schools/{school_id}/tenants/teachers',[

									'as'   => 'tenants.teachers.index',
									'uses' => 'Controllers\SchoolsManagerController@getTeachersIndex'
	
												]);

//Create
Route::get('schools/{school_id}/tenants/teachers/create',[

									'as'   => 'tenants.teachers.create',
									'uses' => 'Controllers\SchoolsManagerController@getTeachersCreate'
	
												]);

//Show
Route::get('schools/{school_id}/tenants/teachers/{id}',[

									'as'   => 'tenants.teachers.show',
									'uses' => 'Controllers\SchoolsManagerController@getTeachersShow'
	
												]);

//Store
Route::post('schools/{school_id}/tenants/teachers/store',[

									'as'   => 'tenants.teachers.store',
									'uses' => 'Controllers\SchoolsManagerController@postTeachersStore'
	
												]);

//edit
Route::get('schools/{school_id}/tenants/teachers/{id}/edit',[

									'as'   => 'tenants.teachers.edit',
									'uses' => 'Controllers\SchoolsManagerController@getTeachersEdit'
	
												]);

//update
Route::put('schools/{school_id}/tenants/teachers/{id}/update',[

									'as'   => 'tenants.teachers.update',
									'uses' => 'Controllers\SchoolsManagerController@putTeachersUpdate'
	
												]);

//Delete
Route::get('schools/{school_id}/tenants/teachers/{id}/delete',[

									'as'   => 'tenants.teachers.delete',
									'uses' => 'Controllers\SchoolsManagerController@getTeachersDelete'
	
												]);

//Destroy
Route::delete('schools/{school_id}/tenants/teachers/{id}/destroy',[

									'as'   => 'tenants.teachers.destroy',
									'uses' => 'Controllers\SchoolsManagerController@deleteTeachersDestroy'
	
												]);