<?php

namespace App\Http\Controllers;

class GenresController extends BaseController
{
    public function __construct()
    {
        $this->class = \App\Genre::class;
    }

    protected function getArrayValidate(){
        return [
            "name" => "required|string"
        ];
    }
}
