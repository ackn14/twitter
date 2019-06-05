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

Route::group(['prefix'=>'admin'],function(){
    route::get('twitter','Admin\TwitterController@index')->middleware('auth');
    route::post('twitter/create','Admin\TwitterController@create')->middleware('auth');
    route::get('twitter/edit','Admin\TwitterController@edit')->middleware('auth');
    route::post('twitter/edit','Admin\TwitterController@update')->middleware('auth');
    route::get('twitter/delete','Admin\TwitterController@delete')->middleware('auth');
});

Route::group(['prefix'=>'admin'],function(){
    route::get('profile','Admin\ProfileController@index')->middleware('auth');
    route::get('profile/edit','Admin\ProfileController@edit')->middleware('auth');
    route::post('profile/edit','Admin\ProfileController@update')->middleware('auth');
});

Auth::routes();

Route::get('/','TwitterController@index');
Route::get('/profile','Admin\ProfileController@profile');
Route::get('/twitter/show','TwitterController@show');
