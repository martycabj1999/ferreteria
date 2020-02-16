<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class SearchController extends Controller
{
    public function show( Request $request){
        $query = $request->query;
        $products = Product::where('name', 'like', '%$query%')->get();
        
        return Response::json($products);
    }
}
