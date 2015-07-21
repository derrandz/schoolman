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

//Index
Route::get('dashboard/users',[
							
							'as' 	=> 'dashboard.users.index',
						  	'uses' 	=> 'Controllers\DashboardController@getUsersIndex'
						  	
						  	]);

//Get
Route::get('dashboard/users/create',[
							
							'as' 	=> 'dashboard.users.create',
						  	'uses' 	=> 'Controllers\DashboardController@getUsersCreate'

						  	]);

//Show
Route::get('dashboard/users/{id}',[

							'as'   => 'dashboard.users.show',
							'uses' => 'Controllers\DashboardController@getUsersShow'
								]);

//Post
Route::post('dashboard/users/store',[
							
							'as' 	=> 'dashboard.users.store',
						  	'uses' 	=> 'Controllers\DashboardController@postUsersStore'
						  		]);

//edit
Route::get('dashboard/users/{id}/edit',[

							'as'    => 'dashboard.users.edit',
						  	'uses' 	=> 'Controllers\DashboardController@getUsersEdit'
									]);

//update
Route::put('dashboard/users/{id}/update',[
							
							'as' 	=> 'dashboard.users.show',
						  	'uses' 	=> 'Controllers\DashboardController@putUsersUpdate'

						  	]);

//Delete
Route::get('dashboard/users/{id}/delete',[
							
							'as' 	=> 'dashboard.users.delete',
						  	'uses' 	=> 'Controllers\DashboardController@getUsersDelete'

						  	]);

//Destroy
Route::delete('dashboard/users/{id}/destroy',[
							
							'as' 	=> 'dashboard.users.destroy',
						  	'uses' 	=> 'Controllers\DashboardController@deleteUsersDestroy'

						  	]);
