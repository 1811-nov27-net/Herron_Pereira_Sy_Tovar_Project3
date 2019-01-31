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

Route::group([
    //'namespace' => 'Site',
    'as' => 'site.'
], function() 
{
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('orders', 'OrdersController@index')->name('orders.index');
    //Search
    Route::get('orders/search', 'OrdersController@search')->name('orders.searchAll');
    Route::get('orders/search/{search}', 'OrdersController@search')->name('orders.search');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
