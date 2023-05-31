<?php
namespace App\Model;

require_once __DIR__ .  '/Model.php';

class Family extends Model{
    private $fname,$pname,$lname,$count,$phone,$state,$area;

    public function setFName($fname){
        $this->fname=$fname;
    }

    public function getFName(){
        return $this->fname;
    }

    public function setPName($pname){
        $this->pname=$pname;
    }

    public function getPName(){
        return $this->pname;
    }

    public function setLName($lname){
        $this->lname=$lname;
    }

    public function getLName(){
        return $this->lname;
    }

    public function setCount($count){
        $this->count=$count;
    }

    public function getCount(){
        return $this->count;
    }

    public function setPhone($phone){
        $this->phone=$phone;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function setState($state){
        $this->state=$state;
    }

    public function getState(){
        return $this->state;
    }

    public function setArea($area){
        $this->area=$area;
    }

    public function getArea(){
        return $this->area;
    }

    public function save(){
        if($this->id){
            $qry="UPDATE families SET fname='$this->fname', pname='$this->pname',
            lname='$this->lname',num_of_members='$this->count', phone='$this->phone',
            state='$this->state',area='$this->area' WHERE id='$this->id'";
            $stmt=mysqli_query($this->conn,$qry);
        }
        else{
            $qry1="SELECT * FROM families WHERE phone='$this->phone'";
            $stmt1=mysqli_query($this->conn,$qry1);
            if(mysqli_num_rows($stmt1)==0){
                $qry="INSERT INTO families(fname,pname,lname,num_of_members,phone,state,area)
                 VALUES ('$this->fname','$this->pname','$this->lname','$this->count','$this->phone',
                 '$this->state','$this->area')";
                $stmt=mysqli_query($this->conn,$qry);
                }
            }
       }
    
    public function delete(){
        $qry="DELETE FROM families WHERE id='$this->id'";
        $stmt=mysqli_query($this->conn,$qry);
    }

    public function getAllFamilies(){
        $results=$this->all('families');
        $families=array();
        foreach($results as $result){
            $family = new Family();
            $family->id=$result->id;
            $family->setFName($result->fname);
            $family->setPName($result->pname);
            $family->setLName($result->lname);
            $family->setCount($result->num_of_members);
            $family->setPhone($result->phone);
            $family->setState($result->state);
            $family->setArea($result->area);
            $families[] = $family;
            
        }
        return $families;
       }

       public function getFamilyById($id){
        $qry="SELECT * FROM families WHERE id=$id";
        $stmt=mysqli_query($this->conn,$qry);
        $row=mysqli_fetch_assoc($stmt);
        $family=new Family();
        $family->id=$row['id'];
        $family->setFName($row['fname']);
        $family->setPName($row['pname']);
        $family->setLName($row['lname']);
        $family->setCount($row['num_of_members']);
        $family->setPhone($row['phone']);
        $family->setState($row['state']);
        $family->setArea($row['area']);
        return $family;
       }

       public function search($area){
        $qry="SELECT * FROM families WHERE area='$area'";
        $stmt=mysqli_query($this->conn,$qry);
        $families=array();
        while($row=mysqli_fetch_assoc($stmt)){
            $family=new Family();
            $family->id=$row['id'];
            $family->setFName($row['fname']);
            $family->setPName($row['pname']);
            $family->setLName($row['lname']);
            $family->setCount($row['num_of_members']);
            $family->setPhone($row['phone']);
            $family->setState($row['state']);
            $families[]=$family;
        }
        return $families;
       }
}