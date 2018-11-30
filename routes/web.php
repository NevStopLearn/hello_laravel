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

Route::get('/',function(){
    return redirect('home/index');
});

Route::group(['prefix'=>'home','namespace'=>'Home'],function(){

    Route::get('index','StaticPagesController@index')->name('home.index');
    Route::get('about','StaticPagesController@about')->name('home.about');
    Route::get('help','StaticPagesController@help')->name('home.help');

    Route::get('signup','UserController@create')->name('home.signup');
    Route::resource('user','UserController');
});
