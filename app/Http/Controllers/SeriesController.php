<?php

namespace App\Http\Controllers;

class SeriesController extends BaseController
{
    public function __construct(){
        $this->class = \App\Serie::class;
    }
}
