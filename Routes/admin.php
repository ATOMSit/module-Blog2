<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/

Route::get('datatable', 'PostController@datatable')
    ->name('datatable');

Route::get('index', 'PostController@index')
    ->name('index');
Route::get('create', 'PostController@create')
    ->name('create');
Route::post('store', 'PostController@store')
    ->name('store');
Route::get('edit/{id}', 'PostController@edit')
    ->name('edit');
Route::post('update/{id}', 'PostController@update')
    ->name('update');