<?php

use Illuminate\Support\Facades\Route;

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
    return view('admin.dashboard');
});

Route::get('login','UserController@index_login');
Route::post('login','UserController@login');
Route::get('logout','UserController@logout');
Route::get('register','UserController@register');
Route::post('register','UserController@store_user');
Route::get('profile/{id}','UserController@profile_user');
Route::get('products/index', 'ProductsController@index');
Route::get('products/cart','ProductsController@getProductsCart');
Route::get('cart/add/{type}/{id}','ProductsController@getAddToCart');
Route::get('cart/subtract/{id}','ProductsController@subtractCart');
Route::get('cart/remove/all','ProductsController@removeAllCart');
Route::get('cart/removeItem/{id}','ProductsController@removeItemCart');
Route::get('cart/checkout','ProductsController@getCheckOut');

