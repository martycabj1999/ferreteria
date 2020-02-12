<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return Response::json($products);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lastProducts()
    {
        $products = Product::paginate(15);
        return Response::json($products);
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
    public function store(Request $request)
    {
        //validar
        $messages = [
            'name:required' => 'Debe ingresar un nombre',
            'name:min' => 'Debe ingresar un nombre de minimo 3 caracteres',
            'description:required' => 'Debe ingresar una descripcion',
            'description:max' => 'Maximo 200 caracteres',
            'price:required' => 'Debe ingresar un precio de producto',
            'price:numeric' => 'El precio de producto debe ser un numero',
            'price:min' => 'El precio de producto debe ser mayor o igual a 0',
        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0',
        ];
        $this->validate($data, $rules, $messages);
        //Registrar en la BD el nuevo producto
        $data = $request()->all();
        $product = new Product();
        $product->name = $data->name;
        $product->description = $data->description;
        $product->long_description = $data->long_description;
        $product->price = $data->price;
        $product->category->name ? $data->category->name : 'General';
        $product->save();
        return Response::json(array('El producto fue creado con exito'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    //public function edit(Product $product)
    public function edit($product_id)
    {
        $product = Product::find($product_id);
        return Response::json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Product $product)
    public function update($product_id)
    {
        //validar
        $messages = [
            'name:required' => 'Debe ingresar un nombre',
            'name:min' => 'Debe ingresar un nombre de minimo 3 caracteres',
            'description:required' => 'Debe ingresar una descripcion',
            'description:max' => 'Maximo 200 caracteres',
            'price:required' => 'Debe ingresar un precio de producto',
            'price:numeric' => 'El precio de producto debe ser un numero',
            'price:min' => 'El precio de producto debe ser mayor o igual a 0',
        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0',
        ];
        $this->validate($data, $rules, $messages);
        $data = $request()->all();
        $product = Product::find($product_id);
        $product->name = $data->name;
        $product->description = $data->description;
        $product->long_description = $data->long_description;
        $product->price = $data->price;
        $product->category->name ? $data->category->name : 'General';
        $product->save();
        return Response::json(array('El producto fue editado con exito'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    //public function destroy(Product $product)
    public function destroy($product_id)
    {
        $product = Product::find($product_id);
        $product->delete();
        return Response::json(array('El producto fue eliminado con exito'));
    }
}
