<?php
namespace App\Model;

require_once __DIR__ .  '/Model.php';

class Plant extends Model{
    private $plants_type,$product_quantity,$annual,$family_id;

    public function setPlantsType($plants_type){
        $this->plants_type=$plants_type;
    }

    public function getPlantsType(){
        return $this->plants_type;
    }

    public function setProductQuantity($product_quantity){
        $this->product_quantity=$product_quantity;
    }

    public function getProductQuantity(){
        return $this->product_quantity;
    }

    public function setAnnual($annual){
        $this->annual=$annual;
    }

    public function getAnnual(){
        return $this->annual;
    }

    public function setFamilyId($family_id){
        $this->family_id=$family_id;
    }

    public function getFamilyId(){
        return $this->family_id;
    }

    public function save(){
        if($this->id){
            $qry="UPDATE plants SET plants_type='$this->plants_type', product_quantity='$this->product_quantity',
            annual='$this->annual' WHERE id='$this->id'";
            $stmt=mysqli_query($this->conn,$qry); 
        }
        else{
            
            $qry="INSERT INTO plants(plants_type,product_quantity,annual,family_id)
            VALUES ('$this->plants_type','$this->product_quantity','$this->annual','$this->family_id')";
            $stmt=mysqli_query($this->conn,$qry);
                }
            
       }

       public function delete(){
        $qry="DELETE FROM plants WHERE id='$this->id'";
        $stmt=mysqli_query($this->conn,$qry);
    }


    public function getPlantsById($id){
        $qry="SELECT * FROM plants WHERE id=$id";
        $stmt=mysqli_query($this->conn,$qry);
        $row=mysqli_fetch_assoc($stmt);
        $plant=new Plant();
        $plant->id=$row['id'];
        $plant->setPlantsType($row['plants_type']);
        $plant->setProductQuantity($row['product_quantity']);
        $plant->setAnnual($row['annual']);
        $plant->setFamilyId($row['family_id']);
        return $plant;
    }

    public function searchByType($type){
        $qry="SELECT * FROM plants inner join families on plants.family_id=families.id WHERE plants_type like'%$type%'";
        $stmt=mysqli_query($this->conn,$qry);
        $objects=array();
        while($row=mysqli_fetch_object($stmt)){
                $objects[]=$row;
        }
            return $objects;
       }
    
       public function searchByAnnualProfits($limit){
            $qry="SELECT fname,pname,lname,SUM(annual) as sum_annual_profits FROM families inner join plants on families.id=plants.family_id group by fname having SUM(annual) > $limit ";
            $stmt=mysqli_query($this->conn,$qry);
            $objects=array();
            while($row=mysqli_fetch_object($stmt)){
                $objects[]=$row;
            }
            return $objects;
       }

       public function searchByAnnualProduction($limit){
        $qry="SELECT fname,pname,lname,SUM(product_quantity) as sum_annual_production FROM families inner join plants on families.id=plants.family_id group by fname having SUM(product_quantity) > '$limit'";
        $stmt=mysqli_query($this->conn,$qry);
        $objects=array();
        while($row=mysqli_fetch_object($stmt)){
            $objects[]=$row;
        }
        return $objects;
   }

   public function search(){
        $qry="SELECT * FROM families left join plants on families.id=plants.family_id WHERE families.state='unemployee' AND families.area='City-center' ";
        $stmt=mysqli_query($this->conn,$qry);
        $objects=array();
        while($row=mysqli_fetch_object($stmt)){
            $objects[]=$row;
        }
        return $objects;
   }
    
       public function getPlants(){
        $qry="SELECT * FROM families inner join plants on families.id=plants.family_id";
        $stmt=mysqli_query($this->conn,$qry);
        $objects=array();
        while($row=mysqli_fetch_object($stmt)){
            $objects[]=$row;
        }
        return $objects;
       }

}