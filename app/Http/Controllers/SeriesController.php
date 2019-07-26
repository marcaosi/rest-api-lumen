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
        $db = new SerieDataBase();
        $db->delete($id);
    }

    /**
     * Route PUT
     */
    public function put(Request $request, $id){
        $serie = json_decode($request->getContent(), true);
        $serie["id"] = $id;
        $db = new SerieDataBase();
        return $db->update($serie);
    }
}
