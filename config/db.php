<?php
namespace app\database;

class Connection{

    public $localhost , $user ,$pass,$db ;

    public function __construct(){
        $this->localhost = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = 'db';
    }
    public function getConn(){
        $conn=mysqli_connect($this->localhost,$this->user,$this->pass,$this->db);
        if($conn){
            // echo "<script>alert('Successfully connected')</script>";
            return $conn;
        }
        else{
            echo "<script>alert('Failed')</script>";
        }
    }
}