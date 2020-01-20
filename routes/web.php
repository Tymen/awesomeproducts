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
Route::get('/tag/{tag?}', "PagesController@tag");
Route::get('/elements', "PagesController@elements");
Route::get('/contact', "PagesController@contact");
Route::post('/contact', "PagesController@contactCreate");
Route::get('/blog', "PagesController@blog");

Auth::routes();

Route::namespace('Admin')->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', "AdminController@index");
    Route::get('/contact', "AdminController@contact");
    Route::get('/contact/{id}', "AdminController@contactShow");
    Route::resource('/users', "UserController");
    Route::resource('/tag', "TagController");
    Route::resource('/post', "PostController");
});
Route::get('/profile', 'HomeController@index')->name('home');
Route::get('/post/{tag}/{title}/{id}', "Admin\PostController@show");
Route::get('/link/{title}/{id}', "ShortLinkController@redirect");
