<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'FrontEnd\FrontendController@index' )->name('home');


Route::get('/categorie/{id}', 'FrontEnd\FrontendController@view_cat' );
Route::get('/produit/{id}', 'FrontEnd\FrontendController@view_prod' );


Auth::routes();

Route::post('add-to-cart','FrontEnd\CartController@addProd');

Route::middleware(['auth'])->group(function () {
    Route::get('cart','FrontEnd\CartController@view');
    Route::post('delete-cart-item','FrontEnd\CartController@deleteProd');

    Route::get('checkout','FrontEnd\CheckOutController@index');
    Route::post('place-order','FrontEnd\CheckOutController@placeOrder');

    Route::get('my-orders','FrontEnd\UserController@index');
 });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::middleware(['auth','isAdmin'])->group(function () {

    Route::get('/dashboard', 'Admin\FrontEndController@index');

    Route::get('/categories', 'Admin\CategoryController@index');
    Route::get('/add-category', 'Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-cat/{id}','Admin\CategoryController@edit');
    Route::put('update-cat/{id}','Admin\CategoryController@update');
    Route::get('delete-cat/{id}','Admin\CategoryController@destroy');

    Route::get('/products', 'Admin\ProductController@index');
    Route::get('/add-product', 'Admin\ProductController@add');
    Route::post('insert-product','Admin\ProductController@insert');
    Route::get('edit-prod/{id}','Admin\ProductController@edit');
    Route::put('update-prod/{id}','Admin\ProductController@update');
    Route::get('delete-prod/{id}','Admin\ProductController@destroy');

    Route::get('/users', 'Admin\UserController@index');

 });
