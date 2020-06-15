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


Route::get('/', 'WelcomeController@index')->name('/');
  Route::get('/shop', 'ShopController@index')->name('/shop');

Auth::routes();
Route::get('details/{id}',[
  'uses'=>'ShopController@show',
  'as'=>'details'
]);
Route::post('/cart/add',[
  'uses'=>'CartController@add_to_cart',
  'as'=>'cart.add'
]);

Route::get('/cart',[
  'uses'=>'CartController@cart',
  'as'=>'cart'
]);

Route::get('/cart/delete/{id}',[
  'uses'=>'CartController@cart_delete',
  'as'=>'cart.delete'
]);

Route::get('/cart/increment/{id}/{qty}',[
  'uses'=>'CartController@increment',
  'as'=>'cart.increment'
]);

Route::get('/cart/decrement/{id}/{qty}',[
  'uses'=>'CartController@decrement',
  'as'=>'cart.decrement'
]);
Route::get('/cart/rapid/add/{id}',[
  'uses'=>'CartController@rapid_add',
  'as'=>'cart.rapid.add'
]);

Route::get('/cart/checkout',[
  'uses'=>'CheckoutController@index',
  'as'=>'cart.checkout'
]);
Route::get('/checkout/store',[
  'uses'=>'CheckoutController@store',
  'as'=>'checkout.store'
]);

Route::middleware(['auth'])->group(function(){
  Route::get('/home', 'HomeController@index')->name('home');
  Route::resource('categories', 'Admin\CategoryController');
  Route::resource('products', 'Admin\ProductController');
  Route::put('products/{products}/hot_news', 'Admin\ProductController@hot_news');
  Route::put('products/{products}/status', 'Admin\ProductController@status');

});

Route::middleware(['auth','admin'])->group(function(){
  Route::get('users','UsersController@index')->name('users.index');
  Route::get('trashed-products', 'Admin\ProductController@trashed')->name('trashed-products.index');
  Route::post('users/{user}/make-admin', 'UsersController@makeadmin')->name('users.make-admin');
  Route::post('users/{user}/make-moderator', 'UsersController@makemoderator')->name('users.make-moderator');

});
