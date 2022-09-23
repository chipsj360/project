<?php 
include_once 'Blood_repository.php';
include_once 'test_repository.php';

class DonorRepository{
    //DB connection details
   private $db_conn;

   private $table ='donor';

   //propeties
   public $donor_id;
   public $first_name;
   public $last_name;
   public $gender;
   public $dob;
   public $blood_group;
   public $phone_number;
   public $weight;
   public $user_name;
   public $password;
   public $filtervalues;
   

   //Constructor with DB
   public function __construct($db){
       $this-> db_conn = $db;
}

public function insert(){
   //Insert query
   $query = ' INSERT INTO ' . $this->table . '
       SET
           donor_id= :donor_id,
           first_name = :first_name,
           last_name= :last_name,
           gender = :gender,
           dob = :dob,
           blood_group= :blood_group,
           phone_number = :phone_number,
           weight = :weight,
           user_name = :user_name,
           password = :password
           ';
   //prepare statement
   $stmt = $this->db_conn->prepare($query);

   //clean data
   $this->donor_id = htmlspecialchars(strip_tags($this->donor_id));
   $this->first_name = htmlspecialchars(strip_tags($this->first_name));
   $this->last_name = htmlspecialchars(strip_tags($this->last_name));
   $this->gender= htmlspecialchars(strip_tags(strval($this->gender)));
   $this->dob = htmlspecialchars(strip_tags($this->dob));
   $this->blood_group = htmlspecialchars(strip_tags($this->blood_group));
   $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));
   $this->weight = htmlspecialchars(strip_tags(($this->weight)));
   $this->user_name = htmlspecialchars(strip_tags($this->user_name));
   $this->password = htmlspecialchars(strip_tags($this->password));
  

   //bind data
   $stmt->bindParam(':donor_id', $this->donor_id);
   $stmt->bindParam(':phone_number', $this->phone_number);
   $stmt->bindParam(':weight', $this->weight);
   $stmt->bindParam(':first_name', $this->first_name);
   $stmt->bindParam(':last_name', $this->last_name);
   $stmt->bindParam(':dob', $this->dob);
   $stmt->bindParam(':gender', $this->gender);
   $stmt->bindParam(':user_name', $this->user_name);
   $stmt->bindParam(':password', $this->password);
   $stmt->bindParam(':blood_group', $this->blood_group);
   

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
            first_name = :first_name,
            last_name = :last_name,
            donor_id = :donor_id,
            gender = :gender,
            dob = :dob,
            phone_number = :phone_number,
            blood_group= :blood_group,
            weight= :weight
        WHERE
            donor_id = :donor_id
            ';

    //prepare statement
    $stmt = $this->db_conn->prepare($query);

    //clean data
    $this->donor_id = htmlspecialchars(strip_tags($this->donor_id));
    $this->phone_number = htmlspecialchars(strip_tags(strval($this->phone_number)));
    $this->gender = htmlspecialchars(strip_tags($this->gender));
    $this->first_name = htmlspecialchars(strip_tags($this->first_name));
    $this->last_name = htmlspecialchars(strip_tags(strval($this->last_name)));
    $this->dob = htmlspecialchars(strip_tags($this->dob));
    $this->weight = htmlspecialchars(strip_tags($this->weight));
    $this->blood_group = htmlspecialchars(strip_tags($this->blood_group));

    //bind data
    $stmt->bindParam(':first_name', $this->first_name);
    $stmt->bindParam(':last_name', $this->last_name);
    $stmt->bindParam(':donor_id', $this->donor_id);
    $stmt->bindParam(':gender', $this->gender);
    $stmt->bindParam(':dob', $this->dob);
    $stmt->bindParam(':weight', $this->weight);
    $stmt->bindParam(':blood_group', $this->blood_group);
    $stmt->bindParam(':phone_number', $this->phone_number);

    //excecute query
    if($stmt->execute()){
        return  true;
    }

    //error message incase someething goes wrong
    printf("Error: %s.\n", $stmt->error);
    
    return false;
}

   // delete function
    public function delete()
    {
         //query for delete
         $query = 'DELETE FROM '
               . $this->table . ' 
               WHERE 
                    donor_id =:donor_id';

         //prepare statement
         $stmt = $this->db_conn->prepare($query);
         $stmt->bindParam(':donor_id', $this->donor_id);
         $blood=new BloodRepository($this->db_conn);
         $blood->donor_id=$this->donor_id;
         $blood->delete_by_donor_id();
         if ($stmt->execute()) {
               return  true;
         }

         //error message incase someething goes wrong
         printf("Error: %s.\n", $stmt->error);

         return false;
    }

public function read(){

   $query = 'SELECT
          d.donor_id,   
          d.first_name,
          d.last_name, 
          d.gender, 
          d.dob, 
          d.blood_group,
          d.phone_number, 
          d.weight,
          d.user_name, 
          d.password
       
          FROM
          '.$this->table.' d
			';

   // prepare statement
   $stmt = $this->db_conn->prepare($query);


   //Execute query
   $stmt->execute();

   return $stmt->fetchAll();
}


public function search_read($filtervalues){

    $query = "SELECT
           d.donor_id,   
           d.first_name,
           d.last_name, 
           d.gender, 
           d.dob, 
           d.blood_group,
           d.phone_number, 
           d.weight,
           d.user_name, 
           d.password
        
           FROM
           '.$this->table.' d
           WHERE first_name:first_name'
             ";
 
    // prepare statement
    $stmt = $this->db_conn->prepare($query);
    $stmt->bindParam(':first_name',$filtervalues);
 
    $stmt->setFetchMode(PDO::FETCH_OBJ); 
    //Execute query
    $stmt->execute();
 
    return $stmt->fetch();
 }
 


public function get_by_blood_group($blood_group){

    $query = 'SELECT
           d.donor_id,   
           d.first_name,
           d.last_name, 
           d.gender, 
           d.dob, 
           d.blood_group,
           d.phone_number, 
           d.weight,
           d.user_name, 
           d.password
        
           FROM
           '.$this->table.' d
            WHERE 
            blood_group=:blood_group
             ';
 
    // prepare statement
    $stmt = $this->db_conn->prepare($query);
    $stmt->bindParam(':blood_group',$blood_group);
 
 
    //Execute query
    $stmt->execute();
 
    return $stmt->fetchAll();
 }
 


public function read_by_id(){

  
   $query = 'SELECT
       d.donor_id,
       d.first_name,
       d.last_name,
       d.blood_group,
       d.phone_number,
       d.gender,
       d.dob,
       d.user_name,
       d.weight
   
   FROM
       '.$this->table.' d
   WHERE 
       donor_id=?
   ';

   // prepare statement
   $stmt = $this->db_conn->prepare($query);

   // Bind ID
   $stmt->bindParam(1,$this->donor_id);

   //Execute query
   $stmt->execute();

   $row = $stmt->fetch(PDO::FETCH_ASSOC);

   //set properties
   $this->donor_id = $row['donor_id'];
   $this->first_name = $row['first_name'];
   $this->last_name = $row['last_name'];
   $this->blood_group = $row['blood_group'];
   $this->phone_number =$row['phone_number'];
   $this->gender =$row['gender'];
   $this->dob =$row['dob'];
   $this->user_name =$row['user_name'];
   $this->weight =$row['weight'];
   
  
 }

public function read_by_id_and_password(){

  
   $query = 'SELECT
               d.first_name,
               d.last_name,
               d.user_name,
               d.password
           FROM
               '.$this->table.' d
           WHERE 
               user_name= ? AND password= ?
           ';

   // prepare statement
    $stmt = $this->db_conn->prepare($query);

    // Bind ID and Password
    $stmt->bindParam(1,$this->user_name);
       $stmt->bindParam(2,$this->password);

   //Execute query
    $stmt->execute();

       $count = $stmt->rowCount();
       
       if($count == 1){

           $row = $stmt->fetch(PDO::FETCH_ASSOC);

           //set properties
           $this->first_name =$row['first_name'];
           $this->last_name =$row['last_name'];
           $this->user_name = $row['user_name'];
           $this->password = $row['password'];
          

           return true;
       }

       return false;
}

public function verify_donor($donor_id){
    $blood=new BloodRepository($this->db_conn);
    $blood->donor_id = $donor_id;
    $stmt=$blood->read_by_donor_id();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    $blood_id = $row['blood_id'];
    $result_id=$row['results_id'];
   $donation_date = $row['donation_date'];

   date_default_timezone_set('Africa/Lusaka');
   $current_date=date('Y-m-d'); 

    $date1=$donation_date;
    $date2=$current_date;

    $ts1 = strtotime($date1);
     $ts2 = strtotime($date2);

     $year1 = date('Y', $ts1);
    $year2 = date('Y', $ts2);

    $month1 = date('m', $ts1);
    $month2 = date('m', $ts2);

$months_past = (($year2 - $year1) * 12) + ($month2 - $month1);

    //TODO: Calculate months from curent date and donation date
    //$months_past = $date_2->diff($date_1);

    $result=new TestRepository($this->db_conn);
    if ($result->check_results($blood_id)) {

        if($months_past >=3){
            return true;
        } else {
            return false;
        }
        
    }
    return false;
}
}



?>