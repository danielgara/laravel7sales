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

Route::get('/', 'HomeController@index')->name("home.index");
Route::get('/home', 'HomeController@home')->name("home.home");
Route::get('/admin/index', 'Admin\AdminHomeController@index')->name("admin.home.index");

Route::get('/products', 'ProductController@index')->name("product.index");
Route::get('/products/{id}', 'ProductController@show')->name("product.show");
Route::post('/products/add-to-cart/{id}', 'ProductController@addToCart')->name("product.addToCart");
Route::get('/cart/remove', 'ProductController@removeCart')->name("product.removeCart");
Route::get('/cart/cart', 'ProductController@cart')->name("product.cart");
Route::post('/cart/buy', 'ProductController@buy')->name("product.buy");

Auth::routes();
