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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth', 'admin'])->prefix('admin')
    ->namespace('Admin')->group(function () {
    //Products
    Route::get('/admin/products', 'ProductController@index');            //Listado
    Route::get('/admin/last-products', 'ProductController@lastProducts');      //Listado ultimos 15 products
    Route::post('/admin/products/create', 'ProductController@create');   //Crear
    Route::get('/admin/products/{product_id}/edit', 'ProductController@edit');      //Editar
    Route::post('/admin/products/{product_id}/edit', 'ProductController@update');   //Editar
    Route::delete('/admin/products/{product_id}', 'ProductController@destroy');   //Editar
    Route::post('/admin/products', 'ProductController@store');           //Registrar
    
    //IMAGES
    Route::get('/products/{product_id}/images', 'ProductImageController@index');            //Listado
    Route::post('/products/{product_id}/images', 'ProductImageController@store');           //Registrar
    Route::delete('/products/{product_id}/images', 'ProductImageController@destroy');       //Eliminar
    Route::post('/products/{product_id}/images/select/{image_id}', 'ProductImageController@select');       //Eliminar
});

//Products
Route::get('/products/{product_id}', 'ProductController@show');

//Cart
Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');
