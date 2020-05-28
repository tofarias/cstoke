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

// Relatórios

Route::get('/report/{date}/productsin', 'ReportController@listProductsIn')->name('listProductsIn');
Route::get('/report/{date}/productsout', 'ReportController@listProductsOut')->name('listProductsOut');

// Cadatro de produtos

Route::get('/products', 'ProductController@index')->name('product.list');

Route::get('/products/new', 'ProductController@showRegisterForm')->name('product.showRegisterForm');
Route::post('/products/new', 'ProductController@insert')->name('product.insert');

Route::get('/products/{id}/edit', 'ProductController@showEditForm')->name('showEditForm');
Route::post('/products/edit', 'ProductController@update')->name('product.update');

Route::post('/products/{id}/delete', 'ProductController@delete')->name('product.delete');

Route::post('/products/find', 'ProductController@ajaxFindProduct')->name('product.ajaxFindProduct');


// Entrada de produtos

Route::get('/productsin', 'ProductInController@index')->name('productin.list');

Route::get('/productsin/new', 'ProductInController@showRegisterForm')->name('productin.showRegisterForm');
Route::post('/productsin/new', 'ProductInController@insert')->name('productin.insert');

Route::get('/productsin/{id}/edit', 'ProductInController@showEditForm')->name('showEditForm');
Route::post('/productsin/edit', 'ProductInController@update')->name('productin.update');

Route::post('/productsin/{id}/delete', 'ProductInController@delete')->name('productin.delete');


