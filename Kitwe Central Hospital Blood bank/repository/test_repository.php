<?php
include_once 'Blood_repository.php';
include_once 'BloodBank.php';
 class TestRepository{

private $db_conn;

private $table ='results';

//propeties
public $blood_id;
public $result_id;
public $Hiv;
public $Hepatitis_B;
public $Hepatitis_A;
public $Hepatitis_C;




//Constructor with DB
public function __construct($db){
    $this->db_conn = $db;
   
}

public function insert(){
//Insert query
$query = ' INSERT INTO ' . $this->table . '
    SET
        blood_id=:blood_id,
        Hiv= :Hiv,
        Hepatitis_A= :Hepatitis_A,
        Hepatitis_B = :Hepatitis_B,
        Hepatitis_C = :Hepatitis_C
    
        ';
//prepare statement
$stmt = $this->db_conn->prepare($query);

//clean data
$this->blood_id = htmlspecialchars(strip_tags($this->blood_id));
$this->Hiv = htmlspecialchars(strip_tags($this->Hiv));
$this->Hepatitis_A = htmlspecialchars(strip_tags($this->Hepatitis_A));
$this->Hepatitis_B = htmlspecialchars(strip_tags($this->Hepatitis_B));
$this->Hepatitis_C = htmlspecialchars(strip_tags(($this->Hepatitis_C)));




//bind data
$stmt->bindParam(':blood_id', $this->blood_id);
$stmt->bindParam(':Hiv', $this->Hiv);
$stmt->bindParam(':Hepatitis_B', $this->Hepatitis_B);
$stmt->bindParam(':Hepatitis_C', $this->Hepatitis_C);


$stmt->bindParam(':Hepatitis_A', $this->Hepatitis_A);


//excecute query

$hasresults_been_added = $stmt->execute();

if($hasresults_been_added){

    $query = 'SELECT
    results_id
    FROM
    '.$this->table.'
    WHERE blood_id=?
    ';

    // prepare statement
    $rst = $this->db_conn->prepare($query);

    // Bind ID
    $rst->bindParam(1,$this->blood_id);

    //Execute query
    $rst->execute();

    $row = $rst->fetch(PDO::FETCH_ASSOC);

    //set properties
    $current_result_id = $row['results_id'];
    $blood= new BloodRepository($this->db_conn);
    $blood->blood_id = $this->blood_id;
    if ($blood->update_results_id($current_result_id)) {
        if ($this->check_results($this->blood_id)) {
            $bloodbank=new BloodBank($this->db_conn);
            $blood->read_by_blood_id();
            $bloodbank->quantity=$blood->quantity;
            $bloodbank->blood_group=$blood->blood_group;
            $bloodbank->addblood();
        }
       return true; 
    }

    return false;
   

    
}

//error message incase someething goes wrong
printf("Error: %s.\n", $stmt->error);

return false;
}


public function read(){

    $query = "SELECT * FROM $this->table" ;
 
    // prepare statement
    $stmt = $this->db_conn->prepare($query);
 
 
    //Execute query
    $stmt->execute();
 
    return $stmt->fetchAll();
 }
 




public function read_by_id($result_id){ 
    $query = 'SELECT
    r.Hiv,
    r.Hepatitis_A,
    r.Hepatitis_B,
    r.Hepatitis_C
    FROM
    '.$this->table.' r
    WHERE results_id=?
    ';
    // prepare statement
    $stmt = $this->db_conn->prepare($query);
    // Bind ID
    $stmt->bindParam(1,$result_id);
    //Execute query
    if($stmt->execute()){
        $count = $stmt->rowCount();
        if($count > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            //set properties
            $this->Hiv= $row['Hiv'];
            $this->Hepatitis_A = $row['Hepatitis_A'];
            $this->Hepatitis_B =$row['Hepatitis_B'];
            $this->Hepatitis_C =$row['Hepatitis_C'];
            return true;
        }
    }
    //error message incase someething goes wrong
    printf("Error: %s.\n", $stmt->error);
    return false;
}

public function delete()
    {
         //query for delete
         $query = 'DELETE FROM '
               . $this->table . ' 
               WHERE 
                    results_id=:results_id';

         //prepare statement
         $stmt = $this->db_conn->prepare($query);
         $stmt->bindParam(':results_id', $this->results_id);
         
         
         if ($stmt->execute()) {
               return  true;
         }

         //error message incase someething goes wrong
         printf("Error: %s.\n", $stmt->error);

         return false;
    }

    // Checking Results by blood id 
public function check_results($blood_id){
    $query = 'SELECT
    Hiv,
    Hepatitis_A,
    Hepatitis_B,
    Hepatitis_C
    FROM
    '.$this->table.' 
    WHERE blood_id=?
    ';

    $stmt = $this->db_conn->prepare($query);

    $stmt->bindParam(1,$blood_id);

    $stmt->execute();

     $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //set properties
            

     if($row['Hiv']== 'Negative' && $row['Hepatitis_A']== 'Negative' && $row['Hepatitis_B']== 'Negative' && $row['Hepatitis_C']=='Negative' ){
        return true;
     } else {
        return false;
      }

            
        
    
}
 }
?>