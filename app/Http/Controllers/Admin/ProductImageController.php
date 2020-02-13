<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductImage;
use App\Product;
use Illuminate\Http\Request;
use Response;
use File;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        $product = Product::find($product_id);
        $images = $product->images()->orderBy('featured')->get();
        return Response::json($images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        // Guardar la imagen en el proyecto
        $file = $request->file('photo');
        $path = public_path() . '/images/products';
        $fileName = uniqid() . $file->getClientOriginalName();
        $moved = $file->move($path, $fileName);

        //Crear un registro en la tabla product_images
        if($moved){
            $productImage = new ProductImage();
            $productImage->image = $fileName;
            //$productImage->featured = false;
            $productImage->product_id = $product_id;
            $productImage->save();
        }
        return Response::json($productImage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImage $productImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    //public function destroy(ProductImage $productImage)
    public function destroy(Request $request, $product_id)
    {
        //Eliminar archivo
        $productImage = ProductImage::find($request->image_id);
        if(substr($productImage->image, 0 , 4) === "http"){
            $delete = true;
        } else {
            $fullPath = public_path() . 'images/products/' . $productImage->image;
            $delete = File::delete($fullPath);
        }
        if($delete){
            $productImage->delete();
        }
    }

    public function select($product_id, $image_id)
    {
        ProductImage::where('product_id', $product_id)->update([
            'featured' => false
        ]);
        $productImage = ProductImage::find($image_id);
        $productImage->featured = true;
        $productImage->save();
    }
}
