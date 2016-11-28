<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::any('/', ['uses' => 'HomeController@index']);

Auth::routes();


Route::get('/home', 'HomeController@index');

Route::get('/user_control', 'UserController@userList');
Route::get('/create_user', 'UserController@createUser');
Route::post('/create_user', 'UserController@createUser');
Route::get('/add_user', function() {
    return View::make('user/add_user');
});
Route::get('/{id}/edit_user', 'UserController@getUserData');
Route::post('/{id}/update_user', 'UserController@updateUser');
Route::get('/{id}/delete_user', 'UserController@deleteUser');

Route::get('/news', function() {
    return View::make('news');
});
