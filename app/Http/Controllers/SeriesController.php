<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SeriesController extends BaseController
{
    public function __construct(){
        $this->class = \App\Serie::class;
    }

    protected function getArrayValidate(){
        return [
            "name" => "required|string",
            "resume" => "required",
            "genre_id" => "required|int",
            "user_id" => "required|int"
        ];
    }

    public function get(Request $request, $id = null){
        if(is_null($id)){
            $resources = $this->class::where("user_id", $request->user->id)->paginate();
        }else{
            $resources = $this->class::where("id", $id)->where("user_id", $request->user->id)->first();
        }
        return response($resources);
    }
}
