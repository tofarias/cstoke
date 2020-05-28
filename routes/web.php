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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/report/{date}/productsin', 'ReportController@listProductsIn')->name('listProductsIn');
Route::get('/report/{date}/productsout', 'ReportController@listProductsOut')->name('listProductsOut');

Route::get('/products', 'ProductController@index')->name('product.list');

Route::get('/products/new', 'ProductController@showRegisterForm')->name('product.showRegisterForm');
Route::post('/products/new', 'ProductController@insert')->name('product.insert');

Route::get('/products/{id}/edit', 'ProductController@showEditForm')->name('showEditForm');
Route::post('/product/edit', 'ProductController@update')->name('product.update');

Route::post('/product/{id}/delete', 'ProductController@delete')->name('product.delete');
