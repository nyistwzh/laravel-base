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

Route::get('/', function () {
    return view('welcome');
});

if ('production' != config('app.env')) {
    Route::get('/doc', 'Web\DocController@doc');

    Route::get('/md', 'Web\DocController@md');

    Route::get('/postman', 'Web\DocController@postman');
}
