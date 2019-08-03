<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class BaseController extends Controller{
    protected $class;

    public function get(Request $request, $id = null){
        $resources = $this->class::paginate();
        return $resources;
    }

    abstract protected function getArrayValidate();

    public function post(Request $request){
        $this->validate($request, $this->getArrayValidate());

        $resource = new $this->class;

        $resource->fill($request->all());

        $resource->save();

        return $resource;
    }

    public function delete($id){
        $count = $this->class::destroy($id);

        if($count === 0){
            return response([
                "erro" => "Recurso não encontrado."
            ], 404);
        }

        return response([], 204);
    }

    public function put(Request $request, $id){
        $this->validate($request, $this->getArrayValidate());

        $resource = $this->class::find($id);

        $resource->fill($request->all());

        $resource->save();

        return $resource;
    }
}