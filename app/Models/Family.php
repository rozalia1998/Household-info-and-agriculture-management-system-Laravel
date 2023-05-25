<?php
namespace App\Model;

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

    public function save($conn){
        if($this->id){
            $qry="UPDATE families SET fname='$this->fname', pname='$this->pname',
            lname='$this->lname',num_of_members='$this->count', phone='$this->phone',
            state='$this->state',area='$this->area' WHERE id='$this->id'";
            $stmt=mysqli_query($conn,$qry);
        }
        else{
            $qry1="SELECT * FROM families WHERE phone='$this->phone'";
            $stmt1=mysqli_query($conn,$qry1);
            if(mysqli_num_rows($stmt1)==0){
                $qry="INSERT INTO families(fname,pname,lname,num_of_members,phone,state,area)
                 VALUES ('$this->fname','$this->pname','$this->lname','$this->count','$this->phone',
                 '$this->state','$this->area')";
                $stmt=mysqli_query($conn,$qry);
                }
            }
       }
    
    public function delete($conn){
        $qry="DELETE FROM families WHERE id='$this->id'";
        $stmt=mysqli_query($conn,$qry);
    }

       public static function getAllFamilies($conn){
        $qry="SELECT * FROM families";
        $stmt=mysqli_query($conn,$qry);
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
            $family->setArea($row['area']);
            $families[]=$family;
        }
        return $families;
       }

       public static function getFamilyById($conn,$id){
        $qry="SELECT * FROM families WHERE id=$id";
        $stmt=mysqli_query($conn,$qry);
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

       public static function search($conn,$area){
        $qry="SELECT * FROM families WHERE area='$area'";
        $stmt=mysqli_query($conn,$qry);
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