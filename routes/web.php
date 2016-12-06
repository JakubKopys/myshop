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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/users/{user}/edit', 'UserController@edit');
Route::patch('/users/{user}', 'UserController@update');
Route::get('/users', 'UserController@index');


Route::get('/products/new', 'ProductController@new');
Route::post('/products', 'ProductController@create');
Route::get('/products/{product}/edit', 'ProductController@edit');
Route::get('/products/{product}', 'ProductController@show');
Route::patch('/products/{product}', 'ProductController@update');
Route::get('/products', 'ProductController@index');
Route::delete('/products/{product}', 'ProductController@destroy');