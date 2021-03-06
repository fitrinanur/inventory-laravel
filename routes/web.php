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

Route::get('/', 'Auth\LoginController@showLoginForm' , function () {
    return view('main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'items',  'middleware' => ['auth', 'role:admin']
], function(){
    Route::get('/', 'ItemController@index')->name('item.index');
    Route::get('create','ItemController@create')->name('item.create');
    Route::post('store','ItemController@store')->name('item.store');
    Route::get('{item}/edit', 'ItemController@edit')->name('item.edit');
    Route::patch('{item}/edit','ItemController@update')->name('item.update');
    Route::delete('{item}/delete','ItemController@destroy')->name('item.destroy');
    Route::get('/search', 'ItemController@search')->name('item.search');
});

Route::group([
    'prefix' => 'suppliers', 'middleware' => ['auth', 'role:admin']
],function(){
    Route::get('/','SupplierController@index')->name('supplier.index');
    Route::get('create','SupplierController@create')->name('supplier.create');
    Route::post('store','SupplierController@store')->name('supplier.store');
    Route::get('{supplier}/edit', 'SupplierController@edit')->name('supplier.edit');
    Route::patch('{supplier}/edit','SupplierController@update')->name('supplier.update');
    Route::delete('{supplier}/delete','SupplierController@destroy')->name('supplier.destroy');
    Route::get('/search', 'SupplierController@search')->name('supplier.search');
});

Route::group([
    'prefix' => 'stocks', 'middleware' => ['auth', 'role:admin']
],function(){
    Route::get('/','StockController@index')->name('stock.index');
    Route::get('create','StockController@create')->name('stock.create');
    Route::post('store','StockController@store')->name('stock.store');
    Route::get('out','StockController@checkout_form')->name('stock.out');
});

Route::get('/profile', 'ProfileController@index')->name('user.profile');




