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


//Index
Route::get('schools/{school_id}/tenants/files',[

									'as'   => 'tenants.files.index',
									'uses' => 'Controllers\SchoolsManagerController@getFilesIndex'
	
												]);

//Create
Route::get('schools/{school_id}/tenants/files/create',[

									'as'   => 'tenants.files.create',
									'uses' => 'Controllers\SchoolsManagerController@getFilesCreate'
	
												]);

//Show
Route::get('schools/{school_id}/tenants/files/{id}',[

									'as'   => 'tenants.files.show',
									'uses' => 'Controllers\SchoolsManagerController@getFilesShow'
	
												]);

//Store
Route::post('schools/{school_id}/tenants/files/store',[

									'as'   => 'tenants.files.store',
									'uses' => 'Controllers\SchoolsManagerController@postFilesStore'
	
												]);

//edit
Route::get('schools/{school_id}/tenants/files/{id}/edit',[

									'as'   => 'tenants.files.edit',
									'uses' => 'Controllers\SchoolsManagerController@getFilesEdit'
	
												]);

//update
Route::put('schools/{school_id}/tenants/files/{id}/update',[

									'as'   => 'tenants.files.update',
									'uses' => 'Controllers\SchoolsManagerController@putFilesUpdate'
	
												]);

//Delete
Route::get('schools/{school_id}/tenants/files/{id}/delete',[

									'as'   => 'tenants.files.delete',
									'uses' => 'Controllers\SchoolsManagerController@getFilesDelete'
	
												]);

//Destroy
Route::delete('schools/{school_id}/tenants/files/{id}/destroy',[

									'as'   => 'tenants.files.destroy',
									'uses' => 'Controllers\SchoolsManagerController@deleteFilesDestroy'
	
												]);