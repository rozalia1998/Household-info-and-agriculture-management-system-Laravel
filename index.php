<?php
require_once __DIR__ . '/app/Controllers/UserController.php';
require_once __DIR__ . '/app/Controllers/FamilyController.php';
$config = require 'config/db.php';
require 'config/db.php';
define('BASE_PATH', '/Darrebni/new/');
$db = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);
$controller=new App\Controller\UserController($db);
$con=new App\Controller\FamilyController($db);
if (!$db) {
    die('Connection failed: ' . mysqli_connect_error());
}
$action=$_SERVER['REQUEST_URI'];
switch($action){
    case BASE_PATH:
        $controller->index();
        break;
    case BASE_PATH.'Signup':
        $controller->register();
        break;
    case BASE_PATH.'Dashboard':
        $controller->dashboard();
        break;
    case BASE_PATH.'logout' :
        $controller->logout();
        break;
    case strpos($action, BASE_PATH . 'edit/') === 0 :
        $controller->edit();
        break;
    case strpos($action, BASE_PATH . 'delete/') === 0 :
        $controller->delete();
        break;
    case BASE_PATH.'Show':
        $con->index();
        break;
    case strpos($action, BASE_PATH . 'Show/create') === 0 :
        $con->create();
        break;
    case strpos($action, BASE_PATH . 'Show/edit/') === 0 :
        $con->edit();
        break;
    case strpos($action, BASE_PATH . 'Show/delete/') === 0 :
        $con->delete();
        break;
    case BASE_PATH.'Show/search' :
        $con->search();
        break;
    default:
        $controller->index();    
}