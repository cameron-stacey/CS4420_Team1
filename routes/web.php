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

Route::get('comments/{trail}/trail', ["uses" => 'CommentController@trail_create', "as" => 'comments.trail']);

Route::post('comments/{trail}', ["uses" => 'CommentController@upload', "as" => 'comments.upload']);

Route::resource('guides', 'GuideController');

Route::resource('pics', 'PicController');

Route::get('pics/{trail}/trail', ["uses" => 'PicController@trail_create', "as" => 'pics.trail']);

Route::post('pics/{trail}', ["uses" => 'PicController@upload', "as" => 'pics.upload']);

