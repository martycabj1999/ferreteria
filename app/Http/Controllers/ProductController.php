<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductImage;
use Response;
use Log;

class ProductController extends Controller
{
  public function show()
  {
    //Mostrar datos del producto segun el ID enviado
    $product = Product::all();
    $images = $product->images;

    $imagesLeft = collect();
    $imagesRight = collect();
    foreach ($images as $key => $image) {
      if ($key % 2 === 0) {
        $imagesLeft->push($image);
      } else {
        $imagesRight->push($image);
      }
    }
    $imagesTotal = array();
    $imagesTotal->imagesLeft = $imagesLeft;
    $imagesTotal->imagesRight = $imagesRight;
    return Response::json($imagesTotal);
  }

  public function productsByCategoryId($category_id)
  {
    $products = Product::where('category_id', $category_id)->get();
    Log::info('Obtengo los productos de cierta categoria');

    if ($products) {
      $response = array();
      foreach ($products as $product) {
        $category = Category::find($product['category_id']);
        $images = ProductImage::where('product_id', $product['id'])->get();
        $product['category'] = $category;
        $product['images'] = $images;
        array_push($response, $product);
      }
      Log::info('Enviamos los productos correctamente');
      return Response::json($response, 200);
    }

    Log::error('No se pudo obtener los categorias');
    $response = array("response" => 'No se encontraron resultados');
    return Response::json($response, 404);
  }

  public function getProductById($productId)
  {
    $product = Product::find($productId);
    Log::info('Obtengo un producto');

    if ($product) {

      $category = Category::find($product['category_id']);
      $images = ProductImage::where('product_id', $product['id'])->get();
      $product['category'] = $category;
      $product['images'] = $images;
  
      Log::info('Enviamos el producto correctamente');
      return Response::json($product, 200);
    }

    Log::error('No se pudo obtener el producto');
    return Response::json($product, 404);
  }

}