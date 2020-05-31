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


Route::get('/','ToDoController@index')->name('index');
Route::post('/search','ToDoController@search')->name('search');
Route::get('/create','ToDoController@create')->name('create');
Route::post('/create','ToDoController@store')->name('store');
Route::post('/delete/{id}','ToDoController@destroy')->name('delete');
Route::get('/edit/{id}','ToDoController@edit')->name('edit');
Route::post('/complited/{id}','ToDoController@complited')->name('complited');
Route::post('/incomplite/{id}','ToDoController@incomplite')->name('incomplite');
Route::post('/edit/{id}','ToDoController@update')->name('update');