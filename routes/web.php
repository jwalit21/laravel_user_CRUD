<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@welcome');

Route::get('/index', 'PagesController@index');

Route::resource('posts', 'PostController');

Route::get('/about', 'PagesController@about');

Route::get('/service', 'PagesController@service');

Route::get('hello',function(){
    return 'hello world from laravel';
});

Route::get('/user/{id}',function($id){
    return 'hello world from laravel to the user '.$id;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
