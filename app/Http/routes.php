<?php

use App\Role;

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
Route::auth();
	
Route::get('/home', 'HomeController@index');
Route::get('/', function(){
	
	if(Role::where( 'name', '=', 'teacher' )->count() < 1)
	{
		$teacher = new Role();
		$teacher->name = 'teacher';
		$teacher->save();
	}
	
		return view('welcome');
});
Route::get('wiadomosci', [
		'middleware' => 'auth',
		'uses' => 'PagesController@getWiadomosci'
]);
Route::get('oceny', [
		'middleware' => 'auth',
		'uses' => 'RatingsController@index'
]);
Route::get('kalendarz', [
		'middleware' => 'auth',
		'uses' => 'CalendarController@index'
]);
Route::get('klasy', [
		'middleware' => 'auth',
		'uses' => 'ClassController@index'
]);
Route::resource('posts', 'PostController');
Route::get('students', [
		'middleware' => 'auth',
		'uses' => 'StudentController@index'
]);
Route::post('students', [
		'middleware' => 'auth',
		'uses' => 'StudentController@store'
]);
Route::get('students/create', [
		'middleware' => 'auth',
		'uses' => 'StudentController@create'
]);
Route::get('students/{id}', [
		'middleware' => 'auth',
		'uses' => 'StudentController@show'
]);
Route::get('students/{id}/edit', [
		'middleware' => 'auth',
		'uses' => 'StudentController@edit'
]);
Route::patch('students/{id}/edit', [
		'middleware' => 'auth',
		'uses' => 'StudentController@update'
]);
Route::delete('students/{id}/delete', [
		'middleware' => 'auth',
		'uses' => 'StudentController@destroy'
]);
Route::get('subjects', [
		'middleware' => 'auth',
		'uses' => 'SubjectController@index'
]);
Route::post('subjects', [
		'middleware' => 'auth',
		'uses' => 'SubjectController@store'
]);
Route::get('subjects/create', [
		'middleware' => 'auth',
		'uses' => 'SubjectController@create'
]);
Route::get('subjects/{id}', [
		'middleware' => 'auth',
		'uses' => 'SubjectController@show'
]);
Route::get('subjects/{id}/edit', [
		'middleware' => 'auth',
		'uses' => 'SubjectController@edit'
]);
Route::patch('subjects/{id}/edit', [
		'middleware' => 'auth',
		'uses' => 'SubjectController@update'
]);
Route::delete('subjects/{id}/delete', [
		'middleware' => 'auth',
		'uses' => 'SubjectController@destroy'
]);
Route::get('obecnosci', 'PagesController@getIndex');// nie zrobione

});

