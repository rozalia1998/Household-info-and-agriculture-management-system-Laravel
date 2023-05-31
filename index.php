<?php
require_once __DIR__ . '/app/Controllers/UserController.php';
require_once __DIR__ . '/app/Controllers/FamilyController.php';
require_once __DIR__ . '/app/Controllers/PlantController.php';
define('BASE_PATH', '/Darrebni/new/');
use App\Controller\UserController;
use App\Controller\FamilyController;
use App\Controller\PlantController;
$action=$_SERVER['REQUEST_URI'];
switch($action){
    case BASE_PATH:
        $controller=new UserController();
        $controller->index();
        break;
    case BASE_PATH.'Signup':
        $controller=new UserController();
        $controller->register();
        break;
    case BASE_PATH.'Dashboard':
        $controller=new UserController();
        $controller->dashboard();
        break;
    case BASE_PATH.'logout' :
        $controller=new UserController();
        $controller->logout();
        break;
    case strpos($action, BASE_PATH . 'edit/') === 0 :
        $controller=new UserController();
        $controller->edit();
        break;
    case strpos($action, BASE_PATH . 'delete/') === 0 :
        $controller=new UserController();
        $controller->delete();
        break;
    case BASE_PATH.'Show':
        $con=new FamilyController();
        $con->index();
        break;
    case strpos($action, BASE_PATH . 'Show/create') === 0 :
        $con=new FamilyController();
        $con->create();
        break;
    case strpos($action, BASE_PATH . 'Show/edit/') === 0 :
        $con=new FamilyController();
        $con->edit();
        break;
    case strpos($action, BASE_PATH . 'Show/delete/') === 0 :
        $con=new FamilyController();
        $con->delete();
        break;
    case BASE_PATH.'Show/search' :
        $con=new FamilyController();
        $con->search();
        break;
    case BASE_PATH.'plant/show':
        $con=new PlantController();
        $con->index();
        break;
    case strpos($action, BASE_PATH . 'plant/create') === 0 :
        $con=new PlantController();
        $con->create();
        break;
    case strpos($action, BASE_PATH . 'plant/edit/') === 0 :
        $con=new PlantController();
        $con->edit();
        break;
    case strpos($action, BASE_PATH . 'plant/delete/') === 0 :
        $con=new PlantController();
        $con->delete();
        break;
    case BASE_PATH.'plant/search' :
        $con=new PlantController();
        $con->search();
        break;
    default:
        $controller=new UserController();
        $controller->index();    
}