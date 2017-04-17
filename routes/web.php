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

Route::get('/laravel2', function () {
    return view('laravel2');
});

Route::get('/laravel3', function () {
    return view('laravel3');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
