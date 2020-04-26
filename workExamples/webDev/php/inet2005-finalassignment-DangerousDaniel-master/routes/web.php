<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostsController@index');

Auth::routes();

Route::get('users' , 'UsersController@index');
Route::get('users/{user}/edit', 'UsersController@edit');
Route::patch('users/{user}' , 'UsersController@update');
Route::delete('users/{user}' , 'UsersController@destroy')->middleware('userAdmin');

Route::post('/users/fav/{post}', 'ListsController@addPost');
Route::post('/users/fav/r/{post}', 'ListsController@removePost');


Route::resource('theme', 'ThemesController')->middleware('themeAdmin');
Route::post('theme/switch/{theme}', 'ThemesController@switch');

Route::resource('posts', 'PostsController')->only('create', 'store')->middleware('auth');
//Route::resource('posts', 'PostsController')->only('destroy')->middleware('postAdmin');


Route::get('ajaxposts ', 'PostsController@ajaxPost');
