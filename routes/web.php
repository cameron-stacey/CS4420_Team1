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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('trails', 'TrailController');

Route::get('trails/{trail}/photos', array('as' => 'trails.photos', 'uses' => 'TrailController@photos'));

Route::resource('states', 'StateController');

Route::resource('cities', 'CitiesController');

Route::resource('comments', 'CommentController');

Route::resource('guides', 'GuideController');

Route::resource('pics', 'PicController');

