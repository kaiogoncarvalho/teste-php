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


Route::get('/products', 'ProductController@index')->name('products');
Route::get('/products/datatable', 'ProductController@datatable');

Route::get('/product/{id}', 'ProductController@showEdit');
Route::get('/product', 'ProductController@showCreate');
Route::post('/product', 'ProductController@create');
Route::put('/product/{id}', 'ProductController@edit');
Route::get('/product/delete/{id}', 'ProductController@delete');

Route::get('/stock', 'StockController@create');



