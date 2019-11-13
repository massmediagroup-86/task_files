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

Route::get('/', 'HomeController@index')->middleware('auth');
Route::get('tempfile/{temporaryToken}', 'TempfileController@file');
Route::get('showfile/{permanentToken}', 'ShowfileController@file')->middleware('auth');
Route::get('tokens/{file}', 'TokensController@index')->name('tokens.index')->middleware('auth')->middleware('can:view,file');
Route::get('report/{file}', 'ReportController@show')->name('report.show')->middleware('auth')->middleware('can:view,file');
Route::get('tokens/{file}/generate', 'TokensController@generate')->name('tokens.generate')->middleware('auth')->middleware('can:view,file');
//Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('files', 'FileController')->middleware('auth');
