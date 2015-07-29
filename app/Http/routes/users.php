<?php

/*
|
|
|--------------------------------------------------------------------------
| Users Routes 
|--------------------------------------------------------------------------
|
|
*/

Route::group(['prefix' => 'admin'], function(){


//Index
Route::get('users',[
							
							'as' 	=> 'admin.users.index',
						  	'uses' 	=> 'Controllers\DashboardController@getUsersIndex'
						  	
						  	]);

//Get
Route::get('users/create',[
							
							'as' 	=> 'admin.users.create',
						  	'uses' 	=> 'Controllers\DashboardController@getUsersCreate'

						  	]);


//Show
Route::get('users/{id}',[

							'as'   => 'admin.users.show',
							'uses' => 'Controllers\DashboardController@getUsersShow'
								]);

//Post
Route::post('users/store',[
							
							'as' 	=> 'admin.users.store',
						  	'uses' 	=> 'Controllers\DashboardController@postUsersStore'
						  		]);

//edit
Route::get('users/{id}/edit',[

							'as'    => 'admin.users.edit',
						  	'uses' 	=> 'Controllers\DashboardController@getUsersEdit'
									]);

//update
Route::put('users/{id}/update',[
							
							'as' 	=> 'admin.users.update',
						  	'uses' 	=> 'Controllers\DashboardController@putUsersUpdate'

						  	]);

//Delete
Route::get('users/{id}/delete',[
							
							'as' 	=> 'admin.users.delete',
						  	'uses' 	=> 'Controllers\DashboardController@getUsersDelete'

						  	]);

//Destroy
Route::delete('users/{id}/destroy',[
							
							'as' 	=> 'admin.users.destroy',
						  	'uses' 	=> 'Controllers\DashboardController@deleteUsersDestroy'

						  	]);


});