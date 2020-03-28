<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Response;

class SearchController extends Controller
{
    public function show( Request $request){
        $query = $request->query;
        $products = Product::where('name', 'like', '%$query%')->get();
        
        return Response::json($products);
    }

    public function search(){

        $data = \Request::all();
        $query = $data['searchText'];

        $products = Product::where('name','LIKE','%'. $query .'%')->get();

        if ($products) {
            Log::info('Obtuvimos productos en la busqueda');
            $response = [];
            if( $products ){
                foreach( $products as $product ){ 
                    $category = Category::find($product['category_id']);
                    $images = ProductImage::where('product_id', $product['id'])->get();
                    $product['category'] = $category;
                    $product['images'] = $images;
                    array_push($response, $product);
                }
                return \Response::json($response, 200);
            }
        }
        
        return Response::json($products);
    }
}
