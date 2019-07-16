<?php

namespace App\Http\Controllers;

class SeriesController extends Controller
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

    //
    /**
     * Route GET
     * Params @id
     * 
     */
    public function get($id = null){
        return array("data"=>"dados");
    }
}
