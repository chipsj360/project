<?php
class dbconnect{
    private $host ='localhost';
    private $db_name ='ktch_db';
    private $username ='root';
    private $password ='';
    private $conn;


    // DB Connect
    public function connect(){
        $this->conn = null;

        // try catch connection  for any errors
        try {
            $this->conn= new PDO('mysql:host=' . $this->host . '; dbname=' . $this->db_name,
            $this->username, $this->password); //connection in PD
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'Connection Error: '. $e->getMessage();
        }

        return $this->conn;
    }

    
}

?>