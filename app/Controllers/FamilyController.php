<?php
namespace App\Controller;
require_once 'BaseController.php';
require_once __DIR__ . '/../Models/Family.php';
use App\Model\Family;
class FamilyController extends BaseController{
    public function index(){
        $families=Family::getAllFamilies($this->conn);
        require __DIR__ . '/../../views/family/index.php';
    }

    public function create(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $family=new Family();
            $family->setFName($_POST['fname']);
            $family->setPName($_POST['pname']);
            $family->setLName($_POST['lname']);
            $family->setCount($_POST['num']);
            $family->setPhone($_POST['phone']);
            $family->setState($_POST['state']);
            $family->setArea($_POST['area']);
            $family->save($this->conn);
            header('Location: /Darrebni/new/Show');
            exit;
        }
        else{
            require 'views/family/create.php';
        }
    }

    public function edit(){
        if(isset($_POST['edit'])){
            $id=$_POST['id'];
            $family=Family::getFamilyById($this->conn,$id);
            $family->setFName($_POST['fname']);
            $family->setPName($_POST['pname']);
            $family->setLName($_POST['lname']);
            $family->setCount($_POST['num']);
            $family->setPhone($_POST['phone']);
            $family->setState($_POST['state']);
            $family->setArea($_POST['area']);
            $family->save($this->conn);
            header('Location: /Darrebni/new/Show');
            exit;
        }
        else{
            $id=$_GET['id'];
            $family=Family::getFamilyById($this->conn,$id);
            require __DIR__ . '/../../views/family/edit.php';
        }
    }

    public function delete(){
        if(isset($_POST['yes'])){
            $id=$_POST['id'];
            $family = Family::getFamilyById($this->conn, $id);
            $family->delete($this->conn);
            header('Location: /Darrebni/new/Show');
            exit;
        }
        elseif (isset($_POST['no'])){
            header('Location: /Darrebni/new/Show');
            exit;
        }
        else{
            $id=$_GET['id'];
            $family = Family::getFamilyById($this->conn, $id);
            require 'views/family/delete.php';
        }
    }

    public function search(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $area=$_POST['search'];
            $families = Family::search($this->conn, $area);
             if(!empty($families)){
                 require 'views/family/search.php';
             }
             else{
                 header('Location: /Darrebni/new/Show/search');
                exit;
             }
            
        }
         else{
            require 'views/family/search.php';
        }
    }
}