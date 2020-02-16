<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return Response::json($categories);//
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
            'name:min' => 'Debe ingresar un nombre de minimo 3 caracteres'
        ];
        $rules = [
            'name' => 'required|min:3'
        ];
        $this->validate($data, $rules, $messages);
        //Registrar en la BD el nuevo producto
        $data = $request()->all();
        $category = new Category();
        $category->name = $data->name;
        $category->description = $data->description;
        if($category->image){
            $category->image ? $data->image : 'General';
        }
        $category->save();
        return Response::json(array('La categoria fue creada con exito'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return Response::json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($category_id)
    {
        ///validar
        $messages = [
            'name:required' => 'Debe ingresar un nombre',
            'name:min' => 'Debe ingresar un nombre de minimo 3 caracteres'
        ];
        $rules = [
            'name' => 'required|min:3'
        ];
        $this->validate($data, $rules, $messages);
        //Registrar en la BD el nuevo producto
        $data = $request()->all();
        $category = Category::find($category_id);
        $category->name = $data->name;
        $category->description = $data->description;
        if($category->image){
            $category->image ? $data->image : 'General';
        }
        $category->save();
        return Response::json(array('La categoria fue editada con exito'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $category = Category::find($category_id);
        $category->delete();
        return Response::json(array('El producto fue eliminado con exito'));
    }
}
