<?php
namespace App\Controller;
require_once 'BaseController.php';
require_once __DIR__ . '/../Models/Plant.php';
use App\Model\Plant;
class PlantController extends BaseController{
    private $plantobj;
    public function __construct(){
        $this->plantobj=new Plant();
    }
    public function index(){
        $objects=$this->plantobj->getPlants();
        $this->render('plant/index',compact('objects'));
    }

    public function create(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $fid=$_GET['fid'];
            $this->plantobj->setPlantsType($_POST['plants_type']);
            $this->plantobj->setProductQuantity($_POST['product_quantity']);
            $this->plantobj->setAnnual($_POST['annual_production']);
            $this->plantobj->setFamilyId($fid);
            $this->plantobj->save();
            header('Location: /Darrebni/new/Show');
            exit;
        }
        else{
            $this->render('plant/create');
        }
    }

    public function edit(){
        if(isset($_POST['edit'])){
            $id=$_POST['id'];
            $plant=$this->plantobj->getPlantsById($id);
            $plant->setPlantsType($_POST['plants_type']);
            $plant->setProductQuantity($_POST['product_quantity']);
            $plant->setAnnual($_POST['annual_production']);
            $plant->save();
            header('Location: /Darrebni/new/plant/show');
            exit;
        }
        else{
            $id=$_GET['id'];
            $plant=$this->plantobj->getPlantsById($id);
            $this->render('plant/edit',compact('plant'));
        }
    }

    public function delete(){
        if(isset($_POST['yes'])){
            $id=$_POST['id'];
            $plant = $this->plantobj->getPlantsById($id);
            $plant->delete();
            header('Location: /Darrebni/new/plant/show');
            exit;
        }
        elseif (isset($_POST['no'])){
            header('Location: /Darrebni/new/plant/show');
            exit;
        }
        else{
            $id=$_GET['id'];
            $plant = $this->plantobj->getPlantsById($id);
            $this->render('plant/delete',compact('plant'));
            
        }
    }

    public function search(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['SearchByType'])){
                $type=$_POST['plants_type'];
                $objects = $this->plantobj->searchByType($type);
                if(!empty($objects)){
                    $this->render('plant/search',compact('objects'));
                 }
                 else{
                    header('Location: /Darrebni/new/plant/search');
                    exit;
                    
                 }
            }

            elseif(isset($_POST['SearchByProduction'])){
                $annualproduction=$_POST['annualproduction'];
                $objects = $this->plantobj->searchByAnnualProduction($annualproduction);
                if(!empty($objects)){
                    $this->render('plant/search',compact('objects'));
                 }
                 else{
                    header('Location: /Darrebni/new/plant/search');
                    exit;
                    
                 }
            }

            elseif(isset($_POST['SearchByProfits'])){
                $annualprofits=$_POST['annualprofits'];
                $objects = $this->plantobj->searchByAnnualProfits($annualprofits);
                if(!empty($objects)){
                    $this->render('plant/search',compact('objects'));
                 }
                 else{
                    header('Location: /Darrebni/new/plant/search');
                    exit; 
                 }
            }

            else{
                $objects = $this->plantobj->search();
                if(!empty($objects)){
                    $this->render('plant/search',compact('objects'));
                 }
                 else{
                    header('Location: /Darrebni/new/plant/search');
                    exit;
                    
                 }
            }
            
            }
            
         else{
            $this->render('plant/search');
        }
        
    }
}
    
