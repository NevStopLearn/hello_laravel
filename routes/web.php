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

Route::group(['prefix'=>'home','namespace'=>'Home'],function(){
    Route::get('index','StaticPagesController@index')->name('home.index');
    Route::get('about','StaticPagesController@about')->name('home.about');
    Route::get('help','StaticPagesController@help')->name('home.help');
});