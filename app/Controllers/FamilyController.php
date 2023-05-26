<?php
namespace App\Controller;
require_once 'BaseController.php';
require_once __DIR__ . '/../Models/Family.php';
use App\Model\Family;
class FamilyController extends BaseController{
    private $familyobj;
    public function __construct(){
        $this->familyobj=new Family();
    }
    public function index(){
        $families=$this->familyobj->getAllFamilies();
        $this->render('family/index',compact('families'));
    }

    public function create(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->familyobj->setFName($_POST['fname']);
            $this->familyobj->setPName($_POST['pname']);
            $this->familyobj->setLName($_POST['lname']);
            $this->familyobj->setCount($_POST['num']);
            $this->familyobj->setPhone($_POST['phone']);
            $this->familyobj->setState($_POST['state']);
            $this->familyobj->setArea($_POST['area']);
            $this->familyobj->save();
            header('Location: /Darrebni/new/Show');
            exit;
        }
        else{
            $this->render('family/create');
        }
    }

    public function edit(){
        if(isset($_POST['edit'])){
            $id=$_POST['id'];
            $family=$this->familyobj->getFamilyById($id);
            $family->setFName($_POST['fname']);
            $family->setPName($_POST['pname']);
            $family->setLName($_POST['lname']);
            $family->setCount($_POST['num']);
            $family->setPhone($_POST['phone']);
            $family->setState($_POST['state']);
            $family->setArea($_POST['area']);
            $family->save();
            header('Location: /Darrebni/new/Show');
            exit;
        }
        else{
            $id=$_GET['id'];
            $family=$this->familyobj->getFamilyById($id);
            $this->render('family/edit',compact('family'));
        }
    }

    public function delete(){
        if(isset($_POST['yes'])){
            $id=$_POST['id'];
            $family = $this->familyobj->getFamilyById($id);
            $family->delete();
            header('Location: /Darrebni/new/Show');
            exit;
        }
        elseif (isset($_POST['no'])){
            header('Location: /Darrebni/new/Show');
            exit;
        }
        else{
            $id=$_GET['id'];
            $family = $this->familyobj->getFamilyById($id);
            $this->render('family/delete',compact('family'));
            
        }
    }

    public function search(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $area=$_POST['search'];
            $families = $this->familyobj->search($area);
             if(!empty($families)){
                $this->render('family/search',compact('families'));
             }
             else{
                 header('Location: /Darrebni/new/Show');
                exit;
             }
            
        }
         else{
            $this->render('family/search');
        }
        
    }
    
}
