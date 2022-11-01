<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group(['userLogged' => 'App\Http\Controllers'], function()
{
    Route::get('/',             [HomeController::class, 'index'])->name('home');
    Route::post('/register',    [AuthController::class, 'register'])->name('register');
    Route::get('/login',       [AuthController::class, 'show'])->name('index');
    Route::post('/logout',      [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['admin']], function() {
        Route::get('/product',      'ProductController@show')->name('product.show');
        Route::post('/product',     'ProductController@register')->name('register.perform');
        Route::put('/product',      'ProductController@register')->name('register.perform');
        Route::delete('/product',   'ProductController@register')->name('register.perform');

        Route::get('/category',     'CategoryController@show')->name('product.show');
        Route::post('/category',    'CategoryController@register')->name('register.perform');
        Route::put('/category',     'CategoryController@register')->name('register.perform');
        Route::delete('/category',  'CategoryController@register')->name('register.perform');

        Route::get('/provider',     'ProviderController@show')->name('product.show');
        Route::post('/provider',    'ProviderController@register')->name('register.perform');
        Route::put('/provider',     'ProviderController@register')->name('register.perform');
        Route::delete('/provider',  'ProviderController@register')->name('register.perform');

        Route::get('/user',         'UsersController@show')->name('product.show');
        Route::delete('/user',      'UsersController@register')->name('register.perform');
    });

    Route::post('/user',    'UsersController@create')->name('register.perform');
    Route::put('/user',     'UsersController@update')->name('register.perform');

    Route::get('/order',    'OrderController@show')->name('product.show');
    Route::post('/order',   'OrderController@register')->name('register.perform');
    Route::put('/order',    'OrderController@register')->name('register.perform');
    Route::delete('/order', 'OrderController@register')->name('register.perform');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
