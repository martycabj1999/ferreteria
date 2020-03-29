<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SearchResult;
use App\Category;
use App\ProductImage;
use Illuminate\Support\Facades\Log;
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

        $products = Product::where('name','LIKE','%'. $query .'%')->where('state_id', 1)->get();

        if ($products) {
            Log::info('Cargamos productos en la busqueda');
            $response = [];
            if( $products ){
                foreach( $products as $product ){ 
                    $category = Category::find($product['category_id']);
                    $images = ProductImage::where('product_id', $product['id'])->get();
                    $product['category'] = $category;
                    $product['images'] = $images;
                    array_push($response, $product);
                }
            }
        } else {
            Log::error('No se pudo obtener los productos destacados');
			$response = array ( "response" => 'No se encontraron resultados' );
			return \Response::json($response, 404);
        }
        Log::info('Obtuvimos productos en la busqueda');
        return \Response::json($response, 200);
    }

    public function searchResults(){

        $data = \Request::all();

        $products = Product::where('name','LIKE','%'. $data['keywords'] .'%')->where('state_id', 1)->get();

		$searchResults = new SearchResult();
		
        if(isset($data['user_id'])) 
			$searchResults['user_id'] = $data['user_id'];
		else
            $searchResults['user_id'] = 0;
            
        if(isset($data['longitude'])){
            $searchResults['longitude'] = $data['longitude'];
            $searchResults['latitude'] = $data['latitude'];
        } else {
            $searchResults['longitude'] = 0;
            $searchResults['latitude'] = 0;
        }

		if(isset($data['keywords'])) 
			$searchResults->keywords = $data['keywords'];
		else
            $searchResults->keywords = "";
        
		$searchResults->results = count($products);

        Log::info('Enviamos a la BD los resultados de la busqueda');

		$searchResults->save();
	}
}
