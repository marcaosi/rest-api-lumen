<?php

namespace App\DataBase;

class GenreDataBase extends EntityDataBase{
    protected function load(){
        $this->fieldsNotNull = array(
            "name",
            "description"
        );
        $this->entity = "genres";
    }
}