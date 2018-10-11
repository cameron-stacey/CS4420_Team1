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

Route::get ('/register', function () {
    return view('register');
});

Route::get ('/login', function () {
    return view('login');
});

Route::get ('/welcome', function() {
    return view ('welcome');
});

Route::get ('/logout', function() {
    return routes ('logout');
});

Route::get  ('/pass_reset', function() {
   return view ('pass_reset'); 
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
