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

Route::namespace('Admin')->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', "AdminController@index");
    Route::get('/users', "AdminController@users");
    Route::get('/users/{id}/edit', "AdminController@usersEdit");
    Route::post('/users/{id}', "AdminController@usersStore");
    Route::resource('/tag', "TagController");
    Route::resource('/post', "PostController");
});
Route::get('/profile', 'HomeController@index')->name('home');
Route::get('/post/{tag}/{title}/{id}', "Admin\PostController@show");
