<?php

namespace App\Http\Middleware;
use Firebase\JWT\JWT;
use Closure;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try{
            if(!$request->hasHeader("Authorization")){
                throw new \Exception();
            }
            $token = str_replace("Bearer ", "", $request->header("Authorization"));
            $dados = JWT::decode($token, env("KEY_TOKEN"), ['HS256']);
    
            if(is_null($dados->email)){
                throw new \Exception();
            }

            $user = \App\User::where("email", $dados->email)->first();

            if(is_null($user)){
                throw new \Exception();
            }
            
            return $next($request);
        }catch(\Exception $ex){
            return response([
                "Não autorizado."
            ], 403);
        }
    }
}
