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


Route::get('/', "PagesController@index");
Route::get('/about', "PagesController@about");
Route::get('/category', "PagesController@category");
Route::get('/elements', "PagesController@elements");
Route::get('/contact', "PagesController@contact");
Route::get('/blog', "PagesController@blog");
Auth::routes();
Route::get('/admin', "AdminController@index");
Route::get('/admin/users', "AdminController@users");
Route::resource('/admin/tag', "TagController");
Route::resource('/admin/post', "PostController");
Route::get('/profile', 'HomeController@index')->name('home');
