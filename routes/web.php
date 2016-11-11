<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'UserController@index');

Route::resource('user', 'UserController');
Route::resource('book', 'BookController');

Route::get('user/{id}/books', 'BookUserController@showBooks');
Route::get('user/{id}/choosebook', ['as' => 'choose', 'uses' => 'BookUserController@chooseBook']);
Route::post('user/{id}/book', 'BookUserController@takeBook');
Route::delete('user/{user_id}/book/{book_id}', 'BookUserController@returnBook');

Route::get('book/{id}/users', 'BookUserController@showUsers');
Route::get('book/{id}/choosebook', ['as' => 'assign', 'uses' => 'BookUserController@chooseUser']);
Route::post('book/{id}/user', 'BookUserController@assignToUser');
Route::delete('book/{book_id}/user/{user_id}', 'BookUserController@unassignUser');
