<?php

namespace App\Model;

require __DIR__ . "/../../config/db.php";

use app\database\Connection;

abstract class Model{
    protected $id;
    protected $conn;

    public function __construct(){
        $db = new Connection();
        $this->conn = $db->getConn();
    }

    public function getId(){
        return $this->id;
    }

    public function all($table){
        $qry="SELECT * FROM $table";
        $stmt=mysqli_query($this->conn,$qry);
        $results=array();
        while($row=mysqli_fetch_assoc($stmt)){
            $results[]=$row;
        }
        return $results;
    }
    abstract public function save();
    abstract public function delete();
}