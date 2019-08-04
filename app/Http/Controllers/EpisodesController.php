<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class EpisodesController extends BaseController
{
    public function __construct(){
        $this->class = \App\Episode::class;
    }

    protected function getArrayValidate(){
        return [
            "name" => "required|string",
            "description" => "string",
            "season" => "required|int",
            "number" => "required|int",
            "serie_id" => "required|int"
        ];
    }

    public function getBySerie(Request $request, $id){
        $episodes = \App\Episode::where("serie_id", $id)->paginate();

        $code = (\is_null($episodes) || sizeof($episodes) == 0)? 204 : 200;

        return response($episodes, $code);
    }

    public function get(Request $request, $id = null){
        if(is_null($id)){
            $resources = $this->class::select("episodes.*")
                ->where("series.user_id", $request->user->id)
                ->join('series', 'series.id', '=', 'episodes.serie_id')
                ->paginate();
        }else{
            $resources = $this->class::where("episodes.id", $id)
                ->where("series.user_id", $request->user->id)
                ->join('series', 'series.id', '=', 'episodes.serie_id')
                ->first();
        }

        $code = \is_null($resources)? 204 : 200;
        return response($resources, $code);
    }
}
