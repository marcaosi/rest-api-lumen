<?php

namespace App\Http\Controllers;

use \Firebase\JWT\JWT;

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

    public function login(){
        $dados = json_decode($request->getContent(), true);

        if($dados["username"] == "marcaosi" && $dados["password"] == "123456"){
            $key = "rest-api-lumen";

            $token = [
                "username" => "marcaosi",
                "password" => "marcao1996",
                "id" => "1"
            ];

            return JWT::encode($token, $key);
        }else{
            throw new Exception("Dados inválidos.");
        }
    }

    //
}
