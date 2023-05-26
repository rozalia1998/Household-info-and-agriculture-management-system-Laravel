<?php
namespace App\Controller;
require_once 'BaseController.php';
require_once __DIR__ . '/../Models/User.php';
use App\Model\User;

class UserController extends BaseController{
    private $userobj;

    public function __construct(){
        $this->userobj=new User();
    }
    public function index(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->userobj->setEmail($this->validate($_POST['email']));
            $this->userobj->setPass($this->validate($_POST['pass']));
            $res=$this->userobj->login();
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
        } else {
            $this->render('user/login');
        }
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->userobj->setName($this->validate($_POST['name']));
            $this->userobj->setEmail($this->validate($_POST['email']));
            $this->userobj->setPass($this->validate($_POST['pass']));
            $this->userobj->save();
            header('Location: /Darrebni/new/');
            exit;
            }
            else{
                $this->render('user/signup');
            }
        }

    public function dashboard(){
        $users=$this->userobj->getAllUsers();
        $this->render('user/dashboard',compact('users'));
    }

    public function edit(){
        if(isset($_POST['check'])){
            $id = $_POST['id'];
            $user = $this->userobj->getUserById($id);
            $user->setType($_POST['check']);
            $user->save();
            header('Location: /Darrebni/new/Dashboard');
            exit;
        }
        else{
            $id=$_GET['id'];
            $user = $this->userobj->getUserById($id);
            $this->render('user/edit',compact('user'));
        }
    }

    public function delete(){
        if(isset($_POST['yes'])){
            $id=$_POST['id'];
            $user = $this->userobj->getUserById($id);
            $user->delete();
            header('Location: /Darrebni/new/Dashboard');
            exit;
        }
        elseif (isset($_POST['no'])){
            header('Location: /Darrebni/new/Dashboard');
            exit;
        }
        else{
            $id=$_GET['id'];
            $user = $this->userobj->getUserById($id);
            $this->render('user/delete',compact('user'));
        }
    }

    public function logout(){
        $this->userobj->Signout();
        header('location: /Darrebni/new/');
        exit;
    }
    

}