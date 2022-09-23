<?php 
class BloodBank{

private $db_conn;

private $table ='blood_bank';

public $quantity;
public $blood_group;
public $date;
public $operation;


public function __construct($db){
    $this->db_conn = $db;
   
}

public function addblood(){
    $query = ' INSERT INTO ' . $this->table . '
    SET
        blood_group= :blood_group,
        date = :date,
        quantity = :quantity,
        operation = :operation
        ';
//prepare statement
$stmt = $this->db_conn->prepare($query);

//clean data

$this->blood_group = htmlspecialchars(strip_tags($this->blood_group));
$this->quantity = htmlspecialchars(strip_tags($this->quantity));


//bind data
date_default_timezone_set('Africa/Lusaka');
$this->date=date('Y-m-d'); 

$this->operation='fill';

$stmt->bindParam(':date', $this->date);
$stmt->bindParam(':quantity', $this->quantity);
$stmt->bindParam(':blood_group', $this->blood_group);
$stmt->bindParam(':operation', $this->operation);


//excecute query
if($stmt->execute()){
    return  true;
}

//error message incase someething goes wrong
printf("Error: %s.\n", $stmt->error);

return false;
}

public function dispenseblood(){
    $query = ' INSERT INTO ' . $this->table . '
    SET
        blood_group= :blood_group,
        date = :date,
        quantity = :quantity,
        operation = :operation
        ';
//prepare statement
$stmt = $this->db_conn->prepare($query);

//clean data

$this->blood_group = htmlspecialchars(strip_tags($this->blood_group));
$this->quantity = htmlspecialchars(strip_tags($this->quantity));


//bind data
date_default_timezone_set('Africa/Lusaka');
$this->date=date('Y-m-d'); 

$this->operation='dispense';

$stmt->bindParam(':date', $this->date);
$stmt->bindParam(':quantity', $this->quantity);
$stmt->bindParam(':blood_group', $this->blood_group);
$stmt->bindParam(':operation', $this->operation);


//excecute query
if($stmt->execute()){
    return  true;
}

//error message incase someething goes wrong
printf("Error: %s.\n", $stmt->error);

return false;
}

public function get_total_by_bloodgroup(){
   $dispense=$this->get_dispense_by_bloodgroup();
   $fill=$this->get_fill_by_bloodgroup();
   $available=$fill-$dispense;
   return $available;


}


public function get_dispense_by_bloodgroup(){
    $query="SELECT blood_group, SUM(quantity) AS Total 
    FROM blood_bank
     WHERE operation='dispense' AND blood_group= '" . $this->blood_group . "' GROUP BY blood_group";
     
     $stmt = $this->db_conn->prepare($query);

     $stmt->execute();

     $row = $stmt->fetch(PDO::FETCH_ASSOC);

return $row['Total'];
}


public function get_fill_by_bloodgroup(){
    $query="SELECT blood_group, SUM(quantity) AS Total 
    FROM blood_bank
     WHERE operation='fill' AND blood_group= '" . $this->blood_group . "' GROUP BY blood_group";
     
     $stmt = $this->db_conn->prepare($query);

     $stmt->execute();

     $row = $stmt->fetch(PDO::FETCH_ASSOC);

return $row['Total'];
}

}
?>