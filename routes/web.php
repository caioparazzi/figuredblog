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


Route::resource('/','HomeController');
Route::resource('admin/posts','PostController');
Route::resource('post','PostController');
Route::resource('admin','AdminController');
Route::resource('search','SearchController');

Route::get('moreposts/{author?}', 'HomeController@morePosts');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');