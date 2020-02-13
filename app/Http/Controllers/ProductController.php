<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Response;

class ProductController extends Controller
{
    
    public function show($product_id)
    {
        //Mostrar datos del producto segun el ID enviado
        $product = Product::all();
        $images = $product->images;

        $imagesLeft = collect();
        $imagesRight = collect();
        foreach ($images as $key => $image) {
            if($key%2 === 0){
                $imagesLeft->push($image);
            } else {
                $imagesRight->push($image);
            }
        }
        $imagesTotal->imagesLeft = $imagesLeft;
        $imagesTotal->imagesRight = $imagesRight;
        return Response::json($imagesTotal);
    }

}
