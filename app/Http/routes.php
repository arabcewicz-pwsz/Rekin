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


Route::group(['middleware' => ['web']], function () {
Route::get('wiadomosci', 'PagesController@getWiadomosci');
Route::get('oceny', 'PagesController@getOceny');
Route::get('/', 'PagesController@getIndex');
Route::resource('posts', 'PostController');
Route::get('students', 'StudentController@index');
Route::post('students', 'StudentController@store'); 
Route::get('students/create', 'StudentController@create');
Route::get('students/{id}', 'StudentController@show');
Route::get('students/{id}/edit', 'StudentController@edit');
Route::patch('students/{id}/edit', 'StudentController@update');
Route::delete('students/{id}/delete', 'StudentController@destroy');

Route::get('subjects', 'SubjectController@index');
Route::post('subjects', 'SubjectController@store'); 
Route::get('subjects/create', 'SubjectController@create');
Route::get('subjects/{id}', 'SubjectController@show');
Route::get('subjects/{id}/edit', 'SubjectController@edit');
Route::patch('subjects/{id}/edit', 'SubjectController@update');
Route::delete('subjects/{id}/delete', 'SubjectController@destroy');

	});
