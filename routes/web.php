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

    Route::get('index', 'StaticPagesController@index')->name('home.index');
    Route::get('about', 'StaticPagesController@about')->name('home.about');
    Route::get('help', 'StaticPagesController@help')->name('home.help');

    Route::get('login', 'SessionsController@create')->name('home.login');
    Route::post('login', 'SessionsController@store')->name('home.login');
    Route::delete('logout', 'SessionsController@destroy')->name('home.logout');

    Route::get('signup', 'UserController@create')->name('home.signup');
    Route::resource('user', 'UserController');
    Route::get('signup/confirm/{token}', 'UserController@confirmEmail')->name('home.confirm_email');
    Route::get('users/{user}/followings', 'UserController@followings')->name('home.followings');
    Route::get('users/{user}/followers', 'UserController@followers')->name('home.followers');

    Route::resource('statuses', 'StatusesController',['only'=>['store','destroy']]);

    Route::post('/users/followers/{user}', 'FollowersController@store')->name('home.followers_store');
    Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('home.followers_destroy');
});


Route::group(['namespace'=>'Auth'],function(){
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
});