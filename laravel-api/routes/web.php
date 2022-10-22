<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'HomeController@index')->name('home.index');


    Route::group(['middleware' => ['guest']], function () {
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });

    Route::group(['middleware' => ['product']], function () {
        Route::get('/produto', 'ProductController@show')->name('product.show');
        Route::post('/produto', 'ProductController@register')->name('register.perform');
        Route::put('/produto', 'ProductController@register')->name('register.perform');
        Route::delete('/produto', 'ProductController@register')->name('register.perform');
    });
});