<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function login(Request $request){
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required"
        ]);
        try{
            $user = \App\User::where("email", $request->email)->first();
    
            if(is_null($user) || !Hash::check($request->password, $user->password)){
                throw new \Exception();
            }
    
            $token = JWT::encode(
                ["email" => $request->email],
                env("KEY_TOKEN")
            );
    
            return response(
                ["token" => $token]
            );
        }catch(\Exception $ex){
            return response(
                ["Não autorizado."],
                403
            );
        }
    }

    //
}
