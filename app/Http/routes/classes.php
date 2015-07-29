<?php

/*
|
|
|--------------------------------------------------------------------------
| Files Routes 
|--------------------------------------------------------------------------
|
|
*/

Route::group(['prefix' => 'schools'], function(){


//Index
Route::get('{school_id}/classes',[

									'as'   => 'schools.classes.index',
									'uses' => 'Controllers\SchoolsManagerController@getClassesIndex'
	
												]);

//Create
Route::get('{school_id}/classes/create',[

									'as'   => 'schools.classes.create',
									'uses' => 'Controllers\SchoolsManagerController@getClassesCreate'
	
												]);

//Show
Route::get('{school_id}/classes/{id}',[

									'as'   => 'schools.classes.show',
									'uses' => 'Controllers\SchoolsManagerController@getClassesShow'
	
												]);

//Store
Route::post('{school_id}/classes/store',[

									'as'   => 'schools.classes.store',
									'uses' => 'Controllers\SchoolsManagerController@postClassesStore'
	
												]);

//edit
Route::get('{school_id}/classes/{id}/edit',[

									'as'   => 'schools.classes.edit',
									'uses' => 'Controllers\SchoolsManagerController@getClassesEdit'
	
												]);

//update
Route::put('{school_id}/classes/{id}/update',[

									'as'   => 'schools.classes.update',
									'uses' => 'Controllers\SchoolsManagerController@putClassesUpdate'
	
												]);

//Delete
Route::get('{school_id}/classes/{id}/delete',[

									'as'   => 'schools.classes.delete',
									'uses' => 'Controllers\SchoolsManagerController@getClassesDelete'
	
												]);

//Destroy
Route::delete('{school_id}/classes/{id}/destroy',[

									'as'   => 'schools.classes.destroy',
									'uses' => 'Controllers\SchoolsManagerController@deleteClassesDestroy'
	
												]);

});