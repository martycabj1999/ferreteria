<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exception\JWTException;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request){

        $credentials = $request->only('email', 'password');

        try {
            if(!$token = JWTAuth::attempt($credentials)){
                return Response::json(['error' => 'token_invalido', 'status' => '401']);
            }
        } catch ( JWTException $e) {
            return Response::json(['error' => 'not_create_token', 'status' => '500']);
        }

        $response = compact(['varname' => 'token']);
        $response['user'] = Auth::user();

        return $response;
    }
}
