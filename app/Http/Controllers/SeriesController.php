<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DataBase\SerieDataBase;

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
    public function get(Request $request, $id = null){
        $series = \App\Serie::all();
        return $series;
    }

    /**
     * 
     * Route POST
     * 
     */
    public function post(Request $request){

        $serie = new \App\Serie();

        $serie->name = $request->name;
        $serie->resume = $request->resume;

        $serie->save();

        return $serie;
    }

    /**
     * Route DELETE
     */
    public function delete($id){
        $serie = \App\Serie::find($id);
        $serie->delete();
    }

    /**
     * Route PUT
     */
    public function put(Request $request, $id){
        $serie = \App\Serie::find($id);

        $serie->name = $request->name;
        $serie->resume = $request->resume;

        $serie->save();

        return $serie;
    }
}
