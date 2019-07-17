<?php
namespace App\DataBase;

class DataBase{
    private $uriDB;
    private $db;
    private static $instance;

    private function __construct($uriDB){
        $this->uriDB = $uriDB;
        $this->db = json_decode(file_get_contents($this->uriDB), true);
    }

    public static function getInstance($uriDB = "../database/db.json"){
        if(is_null(self::$instance) || !isset(self::$instance)){
            self::$instance = new DataBase($uriDB);
        }

        return self::$instance;
    }

    private function rollback(){
        $this->db = json_decode(file_get_contents($this->uriDB), true);
    }

    private function commit(){
        file_put_contents($this->uriDB, json_encode($this->db));
    }

    private function persist($entity){
        if(!isset($this->db[$entity]) || !is_array($this->db[$entity])) {
            $this->db[$entity] = array();
        }
    }

    public function insert($entity, $data){
        $this->persist($entity);

        if(!is_null($data)){
            if(!isset($data["id"]) || is_null($data["id"])){
                $data["id"] = time();
            }
            $this->db[$entity][] = $data;
            $this->commit();
            return $data;
        }else{
            throw new Exception("Impossível inserir registro nulo.");
        }
    }

    public function getById($entity, $id){
        $this->persist($entity);

        $data = $this->db[$entity];
        $find = null;
        foreach($data as $el){
            if($el["id"] == $id){
                $find = $el;
            }
        }

        return $find;
    }

    public function get($entity, $params){
        $this->persist($entity);

        $data = $this->db[$entity];
        $find = array();
        foreach($data as $el){
            $equal = true;
            foreach ($params as $param => $value) {
                if($el[$param] != $value){
                    $equal = false;
                }
            }
            if($equal){
                $find[] = $el;
            }
        }

        return $find;
    }

    public function delete($entity, $id){
        $this->persist($entity);

        $data = $this->db[$entity];
        $newData = array();
        foreach ($data as $el) {
            if($el["id"] != $id){
                $newData[] = $el;
            }
        }

        $this->db[$entity] = $newData;
        $this->commit();
    }

    public function update($entity, $data){
        $this->persist($entity);
        
        $dataArray = $this->db[$entity];
        
        for ($i = 0; $i < sizeof($dataArray); $i++) {
            if($dataArray[$i]["id"] == $data["id"]){
                foreach($data as $field => $value){
                    $dataArray[$i][$field] = $value;
                }
            }
        }

        $this->db[$entity] = $dataArray;
        $this->commit();
        // return $data;
    }
}