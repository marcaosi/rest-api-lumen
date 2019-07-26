<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DataBase\GenreDataBase;

class GenresController extends Controller
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
        $genres = \App\Genre::all();
        return $genres;
    }

    /**
     * 
     * Route POST
     * 
     */
    public function post(Request $request){
        $genre = new \App\Genre();

        $genre->name = $request->name;
        $genre->save();

        return $genre;
    }

    /**
     * Route DELETE
     */
    public function delete($id){
        $genre = \App\Genre::find($id);
        $genre->delete();
    }

    /**
     * Route PUT
     */
    public function put(Request $request, $id){
        $genre = \App\Genre::find($id);

        $genre->name = $request->name;
        $genre->save();
        
        return $genre;
    }
}
