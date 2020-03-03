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


/*Route::middleware(['auth', 'admin'])->prefix('admin')
    ->namespace('Admin')->group(function () {*/

Route::middleware(['cors', 'jwt.auth'])->namespace('Admin')->group(function () {
    //Products
    Route::get('/admin/products', 'ProductController@index');            //Listado
    Route::get('/admin/last-products', 'ProductController@lastProducts');      //Listado ultimos 15 products
    Route::get('/admin/products/create', 'ProductController@create');   //Crear
    Route::get('/admin/products/{product_id}/edit', 'ProductController@edit');      //Editar
    Route::post('/admin/products/{product_id}/edit', 'ProductController@update');   //Editar
    Route::delete('/admin/products/{product_id}', 'ProductController@destroy');   //Editar
    Route::post('/admin/products', 'ProductController@store');           //Registrar
    
    //IMAGES
    Route::get('/products/images', 'ProductImageController@index');            //Listado
    Route::post('/products/{product_id}/images', 'ProductImageController@store');           //Registrar
    Route::delete('/products/{product_id}/images', 'ProductImageController@destroy');       //Eliminar
    Route::post('/products/{product_id}/images/select/{image_id}', 'ProductImageController@select');       //Eliminar

    //Category
    Route::get('/categories', 'CategoryController@index');            //Listado
    Route::get('/categories/create', 'CategoryController@create');   //Crear
    Route::post('/categories', 'CategoryController@store'); 
    Route::get('/categories/{category_id}/edit', 'CategoryController@edit');      //Editar
    Route::post('/categories/{category_id}/edit', 'CategoryController@update');   //Editar
    Route::delete('/categories/{category_id}', 'CategoryController@destroy');   //Eliminar
    
    /*States
    Route::get('/states', 'StateController@index');            //Listado
    Route::get('/states/create', 'StateController@create');   //Crear
    Route::post('/states', 'StateController@store'); 
    Route::get('/states/{states}/edit', 'StateController@edit');      //Editar
    Route::post('/states/{states}/edit', 'StateController@update');   //Editar
    Route::delete('/states/{states}', 'StateController@destroy');   //Eliminar*/

    Route::get('/categories/{category}', 'CategoryController@show');
});

//Products
Route::middleware(['jwt.auth'])->group(function(){
    Route::get('/products/{product_id}', 'ProductController@show');
    //Categories
    //Search
    Route::get('/search', 'SearchController@show');

    //CartDetails
    Route::post('/cart', 'CartDetailController@store');
    Route::delete('/cart', 'CartDetailController@destroy');

    //Order
    Route::get('/order', 'CartController@update');
});