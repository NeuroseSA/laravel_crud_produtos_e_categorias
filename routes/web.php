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

Auth::routes();

Route::get('/logado/login', 'AuthController@showLogin')->name("logado.showLogin");
Route::get('/logado', 'AuthController@logout')->name("logout");
Route::post('/logado/login/do', 'AuthController@login')->name("logado.login");


Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'AuthController@login');
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



    Route::get('/cliente', 'ClientController@index')->name("client");
    Route::post('/cliente', 'ClientController@store');
    Route::get('/cliente/novo', 'ClientController@create')->name("clientCreate");
    Route::get('/cliente/editar/{id}', 'ClientController@edit')->name("clientEdit");
    Route::post('/cliente/{id}', 'ClientController@update');
    Route::get('/cliente/apagar/{id}', 'ClientController@destroy');
});


