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

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'IndexController@index');
Route::get('/product/{id}', 'ProductController@show');
Route::get('/products/{id}', 'ProductController@index');
Route::get('/search', 'ProductController@search');

Route::get('/cart', 'CartController@index');
Route::post('/cart/add', 'CartController@add');
Route::post('/cart/update', 'CartController@update');
Route::post('/cart/delete', 'CartController@delete');

Route::group(array('prefix' => 'checkout'), function()
{
    Route::get('/', 'CheckoutController@index');
    Route::post('add', 'CheckoutController@add');
});

Route::get('/contacts', 'ContactsController@contacts');
Route::get('/about', 'ContactsController@about');
Route::get('/payment', 'ContactsController@payment');
Route::get('/service', 'ContactsController@service');
Route::post('/contacts/send', 'ContactsController@send');








