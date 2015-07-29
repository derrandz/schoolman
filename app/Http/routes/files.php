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
Route::get('{school_id}/files',[

									'as'   => 'schools.files.index',
									'uses' => 'Controllers\SchoolsManagerController@getFilesIndex'
	
												]);

//Create
Route::get('{school_id}/files/create',[

									'as'   => 'schools.files.create',
									'uses' => 'Controllers\SchoolsManagerController@getFilesCreate'
	
												]);

//Create
Route::get('{school_id}/files/create_teachers',[

									'as'   => 'schools.files.create_teachers',
									'uses' => 'Controllers\SchoolsManagerController@getCreateTeachersFromFiles'
	
												]);


//Create
Route::get('{school_id}/files/create_students',[

									'as'   => 'schools.files.create_students',
									'uses' => 'Controllers\SchoolsManagerController@getCreateStudentsFromFiles'
	
												]);

//Create
Route::get('{school_id}/files/create_classes',[

									'as'   => 'schools.files.create_classes',
									'uses' => 'Controllers\SchoolsManagerController@getCreateSeminarsFromFiles'
	
												]);


//Store
Route::post('{school_id}/files/store_teachers',[

									'as'   => 'schools.files.store_teachers',
									'uses' => 'Controllers\SchoolsManagerController@postStoreTeachersFromFiles'
	
												]);
	

//Store
Route::post('{school_id}/files/store_students',[

									'as'   => 'schools.files.store_students',
									'uses' => 'Controllers\SchoolsManagerController@postStoreStudentsFromFiles'
	
												]);


//Store
Route::post('{school_id}/files/store_classes',[

									'as'   => 'schools.files.store_classes',
									'uses' => 'Controllers\SchoolsManagerController@postStoreClassesFromFiles'
	
												]);

//Show
Route::get('{school_id}/files/{id}',[

									'as'   => 'schools.files.show',
									'uses' => 'Controllers\SchoolsManagerController@getFilesShow'
	
												]);

//Store
Route::post('{school_id}/files/store',[

									'as'   => 'schools.files.store',
									'uses' => 'Controllers\SchoolsManagerController@postFilesStore'
	
												]);

//edit
Route::get('{school_id}/files/{id}/edit',[

									'as'   => 'schools.files.edit',
									'uses' => 'Controllers\SchoolsManagerController@getFilesEdit'
	
												]);

//update
Route::put('{school_id}/files/{id}/update',[

									'as'   => 'schools.files.update',
									'uses' => 'Controllers\SchoolsManagerController@putFilesUpdate'
	
												]);

//Delete
Route::get('{school_id}/files/{id}/delete',[

									'as'   => 'schools.files.delete',
									'uses' => 'Controllers\SchoolsManagerController@getFilesDelete'
	
												]);

//Destroy
Route::delete('{school_id}/files/{id}/destroy',[

									'as'   => 'schools.files.destroy',
									'uses' => 'Controllers\SchoolsManagerController@deleteFilesDestroy'
	
												]);

});


