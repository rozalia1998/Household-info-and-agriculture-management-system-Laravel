<?php
namespace App\Controller;
require_once 'BaseController.php';
require_once __DIR__ . '/../Models/User.php';
use App\Model\User;

class UserController extends BaseController{
    public function index(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $emailError=$this->filterEmail($this->validate($_POST['email']));
            $passwordError=$this->filterPass($this->validate($_POST['pass']));
            if(empty($emailError) && empty($passwordError)){

            $user->setEmail($this->validate($_POST['email']));
            $user->setPass($this->validate($_POST['pass']));
            $res=$user->login($this->conn);
            if($res){
                if($_SESSION['user-type']=='Admin'){
                    header('Location: /Darrebni/new/Dashboard');
                    exit;
                }
                else{
                    header('Location: /Darrebni/new/Show');
                    exit;
                }
            }
        }
        else{

            require 'views/user/login.php';
        }
        } else {
            
            require 'views/user/login.php';
        }
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $user=new User();
            $nameError=$this->filterName($this->validate($_POST['name']));
            $emailError=$this->filterEmail($this->validate($_POST['email']));
            $passwordError=$this->filterPass($this->validate($_POST['pass']));
            if(empty($nameError) && empty($emailError) && empty($passwordError)){
                $user->setName($this->validate($_POST['name']));
                $user->setEmail($this->validate($_POST['email']));
                $user->setPass($this->validate($_POST['pass']));
                $user->save($this->conn);
                header('Location: /Darrebni/new/');
                exit;
            }
            else{
                require 'views/user/signup.php';
            }
        }
        else{
            require 'views/user/signup.php';
        }
    }

    public function dashboard(){
        $users=User::getAllUsers($this->conn);
        require __DIR__ . '/../../views/user/dashboard.php';
    }

    public function edit(){
        if(isset($_POST['check'])){
            $id = $_POST['id'];
            $user = User::getUserById($this->conn, $id);
            $user->setType($_POST['check']);
            $user->save($this->conn);
            header('Location: /Darrebni/new/Dashboard');
            exit;
        }
        else{
            $id=$_GET['id'];
            $user = User::getUserById($this->conn, $id);
            require 'views/user/edit.php';
        }
    }

    public function delete(){
        if(isset($_POST['yes'])){
            $id=$_POST['id'];
            $user = User::getUserById($this->conn, $id);
            $user->delete($this->conn);
            header('Location: /Darrebni/new/Dashboard');
            exit;
        }
        elseif (isset($_POST['no'])){
            header('Location: /Darrebni/new/Dashboard');
            exit;
        }
        else{
            $id=$_GET['id'];
            $user = User::getUserById($this->conn, $id);
            require 'views/user/delete.php';
        }
    }

    public function logout(){
        $user=new User();
        $user->Signout();
        header('location: /Darrebni/new/');
        exit;
    }
    

}