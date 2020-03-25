<?php

namespace App\Http\Controllers;

use App\Customization;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class CustomizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \Request::all();
        $user = User::find($data['id']);
        $customization = Customization::where('company_id', $user['company_id'])->get();
        return Response::json($customization);
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
        $data = \Request::all();
        //$this->validate($data, State::$rules, State::$messages);
        Customization::create( $data );
        return Response::json(array('La personalizacion fue creada con exito'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customization  $customization
     * @return \Illuminate\Http\Response
     */
    public function show(Customization $customization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customization  $customization
     * @return \Illuminate\Http\Response
     */
    public function edit($company_id)
    {
        $customization = Customization::find($company_id);
        return Response::json($customization, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customization  $customization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customization $customization)
    {
        $this->validate($request, Customization::$rules, Customization::$messages);
        $data = \Request::all();
        $customization = Customization::where('company_id', auth()->user()->company_id);
        //Registrar en la BD el nuevo estado
        $customization->update( $request->all() );
        return Response::json(array('La personalizacion fue editada con exito'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customization  $customization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customization $customization)
    {
        //
    }
}
