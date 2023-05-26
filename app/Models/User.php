<?php
namespace App\Model;

require_once __DIR__ .  '/Model.php';

class User extends Model{
   private $name,$email,$password,$type;

   public function setName($name){
       $this->name=$name;
   }

   public function getName(){
       return $this->name;
   }

   public function setEmail($email){
       $this->email=$email;
   }

   public function getEmail(){
       return $this->email;
   }

   public function setPass($password){
       $this->password=$password;
   }

   public function getPass(){
       return $this->password;
   }

   public function setType($type){
       $this->type=$type;
   }

   public function getType(){
       return $this->type;
   }

   public function getAllUsers(){
        $results=$this->all('users');
        $users=array();
        foreach($results as $result){
            if($result['type'] !== 'Admin'){
                $user = new User();
                $user->id=$result['id'];
                $user->setName($result['name']);
                $user->setEmail($result['email']);
                $user->setType($result['type']);
                $user->setPass($result['password']);
                $users[] = $user;
            }
        }
        return $users;
        
    }


   public function getUserById($id){
        $qry="SELECT * FROM users WHERE id=$id";
        $stmt=mysqli_query($this->conn,$qry);
        $row=mysqli_fetch_assoc($stmt);
        $user=new User();
        $user->id = $row['id'];
        $user->setName($row['name']);
        $user->setEmail($row['email']);
        $user->setPass($row['password']);
        $user->setType($row['type']);
        return $user;

   }

   public function save(){
    if($this->id){
        $qry="UPDATE users SET type='$this->type' WHERE id='$this->id'";
        $stmt=mysqli_query($this->conn,$qry);
    }
    else{
        $qry1="SELECT * FROM users WHERE email='$this->email'";
        $stmt1=mysqli_query($this->conn,$qry1);
        if(mysqli_num_rows($stmt1)==0){
            $qry="INSERT INTO users(name,email,password,type) VALUES ('$this->name','$this->email','$this->password','user')";
            $stmt=mysqli_query($this->conn,$qry);
            }
        }
   }

   public function delete(){
        $qry="DELETE FROM users WHERE id='$this->id'";
        $stmt=mysqli_query($this->conn,$qry);
   }

   public function login(){
    $qry="SELECT * FROM users WHERE email='$this->email' AND password='$this->password'";
    $stmt=mysqli_query($this->conn,$qry);
    $res=mysqli_fetch_assoc($stmt);
    if($res){
        session_start();
        $_SESSION['user-name']=$res['name'];
        $_SESSION['user-id']=$res['id'];
        $_SESSION['user-type']=$res['type'];
        return true;
    }
    else return false;
    }

    public function Signout(){
        session_start();
        session_destroy();
    }
}