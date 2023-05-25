<?php
namespace App\Model;

abstract class Model{
    protected $id;

    public function getId(){
        return $this->id;
    }

    abstract public function save($conn);
    abstract public function delete($conn);
}