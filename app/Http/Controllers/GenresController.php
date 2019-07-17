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
        $db = new GenreDataBase();
        
        $params = $request->query();
        
        if(is_null($id)){
            return $db->get($params);
        }else {
            return $db->getById($id);
        }
    }

    /**
     * 
     * Route POST
     * 
     */
    public function post(Request $request){
        $Genre = json_decode($request->getContent(), true);

        $db = new GenreDataBase();

        return $db->insert($Genre);
    }

    /**
     * Route DELETE
     */
    public function delete($id){
        $db = new GenreDataBase();
        $db->delete($id);
    }

    /**
     * Route PUT
     */
    public function put(Request $request, $id){
        $Genre = json_decode($request->getContent(), true);
        $Genre["id"] = $id;
        $db = new GenreDataBase();
        return $db->update($Genre);
    }
}
