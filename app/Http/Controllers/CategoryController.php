<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Log;
use Response;

class CategoryController extends Controller
{
    public function categoryById($category_id)
    {
        $category = Category::find($category_id);
        Log::info("Obtuvimos la categoria");
        if ($category) {
            Log::info("Enviamos la categoria correctamente");
            return Response::json($category, 200);
        }
        Log::error("No se pudo obtener la categoria por id");
        $response = array("response" => 'No se encontraron resultados');
        return Response::json($response, 404);
    }
}
