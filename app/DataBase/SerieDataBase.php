<?php
namespace App\DataBase;

class SerieDataBase extends EntityDataBase{
    protected function load(){
        $this->fieldsNotNull = array(
            "name",
            "genre",
            "description"
        );
        $this->entity = "series";
    }
}