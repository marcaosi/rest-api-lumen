<?php

namespace App\Http\Controllers;

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
}
