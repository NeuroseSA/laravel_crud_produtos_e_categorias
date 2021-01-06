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
    return view('index');
});
Route::get('/produtos', 'ProductController@index')->name("products");
Route::get('/produtos/novo', 'ProductController@create')->name("productCreate");
Route::post('/produtos', 'ProductController@store');
Route::get('/produtos/editar/{id}', 'ProductController@edit')->name("productEdit");
Route::post('/produtos/{id}', 'ProductController@update');
Route::get('/produtos/apagar/{id}', 'ProductController@destroy')->name("productDestroy");



Route::get('/categorias', 'CategoryController@index')->name("category");
Route::post('/categorias', 'CategoryController@store');
Route::post('/categorias/{id}', 'CategoryController@update');
Route::get('/categorias/novo', 'CategoryController@create')->name("categoriesCreate");
Route::get('/categorias/apagar/{id}', 'CategoryController@destroy')->name("categoriesDestroy");
Route::get('/categorias/editar/{id}', 'CategoryController@edit')->name("categoriesEdit");

