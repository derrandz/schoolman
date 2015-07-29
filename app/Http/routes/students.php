<?php

/*
|
|
|--------------------------------------------------------------------------
| Student Routes 
|--------------------------------------------------------------------------
|
|
*/

Route::group(['prefix' => 'schools'], function(){


//Index
Route::get('{school_id}/tenants/students',[

									'as'   => 'schools.students.index',
									'uses' => 'Controllers\SchoolsManagerController@getStudentsIndex'
	
												]);

//Create
Route::get('{school_id}/tenants/students/create',[

									'as'   => 'schools.students.create',
									'uses' => 'Controllers\SchoolsManagerController@getStudentsCreate'
	
												]);

//Show
Route::get('{school_id}/tenants/students/{id}',[

									'as'   => 'schools.students.show',
									'uses' => 'Controllers\SchoolsManagerController@getStudentsShow'
	
												]);

//Store
Route::post('{school_id}/tenants/students/store',[

									'as'   => 'schools.students.store',
									'uses' => 'Controllers\SchoolsManagerController@postStudentsStore'
	
												]);

//edit
Route::get('{school_id}/tenants/students/{id}/edit',[

									'as'   => 'schools.students.edit',
									'uses' => 'Controllers\SchoolsManagerController@getStudentsEdit'
	
												]);

//update
Route::put('{school_id}/tenants/students/{id}/update',[

									'as'   => 'schools.students.update',
									'uses' => 'Controllers\SchoolsManagerController@putStudentsUpdate'
	
												]);

//Delete
Route::get('{school_id}/tenants/students/{id}/delete',[

									'as'   => 'schools.students.delete',
									'uses' => 'Controllers\SchoolsManagerController@getStudentsDelete'
	
												]);

//Destroy
Route::delete('{school_id}/tenants/students/{id}/destroy',[

									'as'   => 'schools.students.destroy',
									'uses' => 'Controllers\SchoolsManagerController@deleteStudentsDestroy'
	
												]);

});