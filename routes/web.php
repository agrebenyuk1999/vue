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

Route::get('/get-products', 'ProductController@index')->name('getProducts');
Route::post('/add-product', 'ProductController@store')->name('addProduct');
Route::post('/add-quantity', 'ProductController@addQuantity')->name('addQuantity');
Route::post('/take-away-quantity', 'ProductController@takeAwayQuantity')->name('takeAwayQuantity');
Route::post('/zeroing-quantity', 'ProductController@zeroingQuantityItem')->name('zeroingQuantityItem');
Route::get('/last-update', 'ProductController@getLastUpdate')->name('getLastUpdate');

Route::get('/vue', function (){
    return view('vue');
});
