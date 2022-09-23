<?php
 class BloodRepository{
private $db_conn;

private $table ='blood';

//propeties
public $blood_id;
public $donor_id;
public $blood_group;
public $phone_number;
public $donation_date;
public $results_id;

public $quantity;



//Constructor with DB
public function __construct($db){
    $this->db_conn = $db;
}

public function insert(){
//Insert query
$query = ' INSERT INTO ' . $this->table . '
    SET
        donor_id= :donor_id,
        blood_group= :blood_group,
        donation_date = :donation_date,
        quantity = :quantity
        ';
//prepare statement
$stmt = $this->db_conn->prepare($query);

//clean data
$this->donor_id = htmlspecialchars(strip_tags($this->donor_id));
$this->blood_group = htmlspecialchars(strip_tags($this->blood_group));
$this->donation_date = htmlspecialchars(strip_tags(($this->donation_date)));

$this->quantity = htmlspecialchars(strip_tags($this->quantity));


//bind data
$stmt->bindParam(':donor_id', $this->donor_id);

$stmt->bindParam(':donation_date', $this->donation_date);

$stmt->bindParam(':quantity', $this->quantity);
$stmt->bindParam(':blood_group', $this->blood_group);


//excecute query
if($stmt->execute()){
    return  true;
}

//error message incase someething goes wrong
printf("Error: %s.\n", $stmt->error);

return false;
}

public function read()
{

    $query = 'SELECT 
        b.donor_id,
        b.blood_id,
        d.first_name,
        d.last_name,
        b.blood_group,
        b.donation_date,
        b.quantity,
        b.results_id
        
     FROM '
        . $this->table . ' b
     LEFT JOIN
        donor d ON b.donor_id = d.donor_id
        
     ';

    //prepare statement
    $stmt = $this->db_conn->prepare($query);
    $stmt->execute();
                 
    return $stmt->fetchAll();
}




public function update_results_id($results_id){
    $query = ' UPDATE ' . 
    $this->table . '
SET
    results_id=:results_id
WHERE
    blood_id= :blood_id
    ';

//prepare statemen
$stmt = $this->db_conn->prepare($query);

//clean data
$this->blood_id= htmlspecialchars(strip_tags($this->blood_id));

//bind data

$stmt->bindParam(':blood_id', $this->blood_id);
$stmt->bindParam(':results_id', $results_id);

//excecute query
if($stmt->execute()){
return  true;
}

//error message incase someething goes wrong
printf("Error: %s.\n", $stmt->error);

return false;
}

public function update(){
    //Insert query
    $query = ' UPDATE ' . 
            $this->table . '
        SET
            results_id=1
        WHERE
            blood_id= :blood_id
            ';

    //prepare statement
    $stmt = $this->db_conn->prepare($query);

    //clean data
    $this->blood_id= htmlspecialchars(strip_tags($this->blood_id));
    
    //bind data
    
    $stmt->bindParam(':blood_id', $this->blood_id);
    
    //excecute query
    if($stmt->execute()){
        return  true;
    }

    //error message incase someething goes wrong
    printf("Error: %s.\n", $stmt->error);
    
    return false;
}


public function read_by_donor_id(){
    $query = 'SELECT
    blood_id,
    results_id,
    donation_date
FROM
    '.$this->table.'
WHERE 
    donor_id=?
    ORDER BY
    donation_date ASC
';

// prepare statement
$stmt = $this->db_conn->prepare($query);

// Bind ID
$stmt->bindParam(1,$this->donor_id);


//Execute query
$stmt->execute();

//set properties
return $stmt;



}


public function delete_by_donor_id()
    {
         //query for delete
         
         $bloods=$this->read_by_donor_id();
         $results=new TestRepository($this->db_conn);
         foreach ($bloods as $blood) {
            $results->results_id = $blood['results_id'];
            $this->blood_id=$blood['blood_id'];
            $results->delete();
            $this->delete();
         }
                
    }


    public function delete()
    {
         //query for delete
         $query = 'DELETE FROM '
               . $this->table . ' 
               WHERE 
                    blood_id =:blood_id';

         //prepare statement
         $stmt = $this->db_conn->prepare($query);
         $stmt->bindParam(':blood_id', $this->blood_id);
        
                 if ($stmt->execute()) {
               return  true;
         }

         //error message incase someething goes wrong
         printf("Error: %s.\n", $stmt->error);

         return false;
    }


    public function read_by_blood_id(){
        $query = 'SELECT
        *
    FROM
        '.$this->table.'
    WHERE 
        blood_id=?
    ';
    
    // prepare statement
    $stmt = $this->db_conn->prepare($query);
    
    // Bind ID
    $stmt->bindParam(1,$this->blood_id);
   
    
    //Execute query
    $stmt->execute();
    
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

 $this->blood_id=$row['blood_id'];
 $this->donor_id=$row['donor_id'];
 $this->blood_group=$row['blood_group'];
 
 $this->donation_date=$row['donation_date'];
 
 $this->results_id=$row['results_id'];
 $this->quantity=$row['quantity'];
    
    
    
    }

 }
?>