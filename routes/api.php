<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['cors'])->group(function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    //Rutas para logout
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    //Rutas para login
    Route::post('login', 'AuthenticateController@authenticate')->name('login');

    //Register
    Route::get('/user', 'UserController@index');
    Route::post('/user', 'UserController@store');
});

//Route::middleware(['cors', 'jwt.auth'])->namespace('Admin')->group(function () {
Route::middleware(['cors'])->namespace('Admin')->group(function () {
    Route::resource('states', 'StateController');
    Route::resource('roles', 'RoleController');
    Route::resource('categories', 'CategoryController');
    Route::get('categories-featured', 'CategoryController@categoriesFeatured');
    
    //Products
    Route::get('/admin/products', 'ProductController@index');                           //Listado
    Route::get('/admin/products-featured', 'ProductController@productsFeatured');       //Listado products featured
    Route::get('/admin/last-products', 'ProductController@lastProducts');               //Listado ultimos 15 products
    Route::get('/admin/products/create', 'ProductController@create');                   //Crear
    Route::get('/admin/products/{product_id}/edit', 'ProductController@edit');          //Editar
    Route::post('/admin/products/{product_id}/edit', 'ProductController@update');       //Editar
    Route::get('/admin/products/{product_id}/inactive', 'ProductController@inactive');  //Editar
    Route::delete('/admin/products/{product_id}', 'ProductController@destroy');         //Eliminar
    Route::post('/admin/products', 'ProductController@store');                          //Registrar

    //IMAGES
    Route::get('/products/images', 'ProductImageController@index');                     //Listado
    Route::post('/products/{product_id}/images', 'ProductImageController@store');       //Registrar
    Route::delete('/products/{product_id}/images', 'ProductImageController@destroy');   //Eliminar
    Route::post('/products/{product_id}/images/select/{image_id}', 'ProductImageController@select');

    //Route::get('/categories/{category}', 'CategoryController@show');
});

//Route::middleware(['cors','jwt.auth'])->group(function(){
Route::middleware(['cors'])->group(function () {

    Route::get('/products/{product_id}', 'ProductController@show');    
    Route::get('/products/{product_id}', 'ProductController@getProductById');

    //Products By Category
    Route::get('/products-by-category/{category_id}', 'ProductController@productsByCategoryId');

    //CartDetails
    Route::post('/cart', 'CartDetailController@store');
    Route::delete('/cart', 'CartDetailController@destroy');

    //Customization
    Route::get('/customization', 'CustomizationController@index'); 
    Route::post('/customization/edit-colors', 'CustomizationController@updateColors'); 

    //Order
    Route::get('/order', 'CartController@update');

    //Category
    Route::get('/category/{category_id}', 'CategoryController@categoryById'); 
    
    //Search
    Route::post('/search', 'SearchController@search');
    Route::post('/search-results', 'SearchController@searchResults');
});
