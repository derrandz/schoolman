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
Route::get('tenants/teachers',[

									'as'   => 'tenant.teachers.index',
									'uses' => 'Controllers\SchoolManagerController@getTeachersIndex'
	
												]);

//Create
Route::get('tenants/teachers/create',[

									'as'   => 'tenant.teachers.create',
									'uses' => 'Controllers\SchoolManagerController@getTeachersCreate'
	
												]);

//Show
Route::get('tenants/teachers/{id}',[

									'as'   => 'tenant.teachers.show',
									'uses' => 'Controllers\SchoolManagerController@getTeachersShow'
	
												]);

//Store
Route::post('tenants/teachers/store',[

									'as'   => 'tenant.teachers.store',
									'uses' => 'Controllers\SchoolManagerController@postTeachersStore'
	
												]);

//edit
Route::get('tenants/teachers/{id}/edit',[

									'as'   => 'tenant.teachers.edit',
									'uses' => 'Controllers\SchoolManagerController@getTeachersEdit'
	
												]);

//update
Route::put('tenants/teachers/{id}/update',[

									'as'   => 'tenant.teachers.update',
									'uses' => 'Controllers\SchoolManagerController@putTeachersUpdate'
	
												]);

//Delete
Route::get('tenants/teachers/{id}/delete',[

									'as'   => 'tenant.teachers.delete',
									'uses' => 'Controllers\SchoolManagerController@getTeachersDelete'
	
												]);

//Destroy
Route::delete('tenants/teachers/{id}/destroy',[

									'as'   => 'tenant.teachers.destroy',
									'uses' => 'Controllers\SchoolManagerController@deleteTeachersDestroy'
	
												]);