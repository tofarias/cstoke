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

Route::get('/relatorio/{date}/produtosin', 'ReportController@listProductsIn')->name('listProductsIn');
Route::get('/relatorio/{date}/produtosout', 'ReportController@listProductsOut')->name('listProductsOut');

// Cadatro de produtos

Route::get('/produtos', 'ProductController@index')->name('product.list');

Route::get('/produtos/novo', 'ProductController@showRegisterForm')->name('product.showRegisterForm');
Route::post('/produtos/novo', 'ProductController@insert')->name('product.insert');

Route::get('/produtos/{id}/editar', 'ProductController@showEditForm')->name('showEditForm');
Route::post('/produtos/editar', 'ProductController@update')->name('product.update');

Route::post('/produtos/deletar', 'ProductController@delete')->name('product.delete');

Route::post('/produtos/find', 'ProductController@ajaxFindProduct')->name('product.ajaxFindProduct');


// Entrada de produtos

Route::get('/produtosin', 'ProductInController@index')->name('productin.list');

Route::get('/produtosin/novo', 'ProductInController@showRegisterForm')->name('productin.showRegisterForm');
Route::post('/produtosin/novo', 'ProductInController@insert')->name('productin.insert');


// Saída de produtos

Route::get('/produtosout', 'ProductOutController@index')->name('productout.list');

Route::get('/produtosout/novo', 'ProductOutController@showRegisterForm')->name('productout.showRegisterForm');
Route::post('/produtosout/novo', 'ProductOutController@insert')->name('productout.insert');