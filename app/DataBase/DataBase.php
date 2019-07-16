<?php
namespace App\DataBase;

class DataBase{
    private $uriDB;
    private $db;
    private $instance;

    private function __construct($uriDB){
        $this->uriDB = $uriDB;
        $this->db = json_decode(file_get_contents($this->uriDB), true);
    }

    public static function getInstance($uriDB){
        if(is_null($this->instance)){
            $this->instance = new DataBase($uriDB);
        }

        return $this->instance;
    }

    private function rollback(){
        $this->db = json_decode(file_get_contents($this->uriDB), true);
    }

    private function commit(){
        file_put_contents($this->uriDB, json_encode($this->db));
    }

    
}