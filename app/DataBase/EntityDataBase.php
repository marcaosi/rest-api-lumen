<?php

namespace App\DataBase;

abstract class EntityDataBase{
    protected $database;
    protected $fieldsNotNull;
    protected $entity;

    public function __construct(){
        $this->database = DataBase::getInstance();
        $this->load();
    }

    abstract protected function load();

    protected function validate($serie){
        foreach ($this->fieldsNotNull as $field) {
            if(!isset($serie[$field]) || empty($serie[$field])) throw new Exception("Informe todos os campos obrigatórios.");
        }
    }

    protected function validateWithId($serie){
        $params = $this->fieldsNotNull;
        $params[] = "id";
        foreach ($params as $field) {
            if(!isset($serie[$field]) || empty($serie[$field])) throw new Exception("Informe todos os campos obrigatórios.");
        }
    }

    public function insert($serie){
        $this->validate($serie);

        $serie = $this->database->insert($this->entity, $serie);

        return $serie;
    }

    public function getById($id){
        return $this->database->getById($this->entity, $id);
    }

    public function get($params = null){
        return $this->database->get($this->entity, $params);
    }

    public function delete($id){
        $this->database->delete($this->entity, $id);
    }

    public function update($serie){
        $this->validateWithId($serie);

        return $this->database->update($this->entity, $serie);
    }
}