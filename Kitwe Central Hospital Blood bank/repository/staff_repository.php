<?php

	class StaffRepository{
		 //DB connection details
		private $db_conn;

		private $table ='staff';

		//propeties
		public $staff_id;
		public $first_name;
		public $last_name;
		public $password;
		public $role;
		

		//Constructor with DB
		public function __construct($db){
			$this-> db_conn = $db;
    }

	 public function insert(){
		//Insert query
		$query = ' INSERT INTO ' . 
				$this->table . '
			SET
			     id = :staff_id,
				first_name = :first_name,
				last_name = :last_name,
				role = :role
				';
		//prepare statement
		$stmt = $this->db_conn->prepare($query);

		//clean data
		$this->staff_id = htmlspecialchars(strip_tags($this->staff_id));
		$this->first_name = htmlspecialchars(strip_tags($this->first_name));
		$this->last_name = htmlspecialchars(strip_tags(strval($this->last_name)));
		$this->password = htmlspecialchars(strip_tags(strval($this->password)));
		$this->role = htmlspecialchars(strip_tags($this->role));

		//bind data
		$stmt->bindParam(':id', $this->staff_id);
		$stmt->bindParam(':first_name', $this->first_name);
		$stmt->bindParam(':last_name', $this->last_name);
		$stmt->bindParam(':role', $this->role);

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
				_staff_id = :staff_id,
				_gender = :gender,
				_dob = :dob,
				_address = :address,
				_role = :role
			WHERE
				_staff_id = :staff_id
				';

		//prepare statement
		$stmt = $this->db_conn->prepare($query);

		//clean data
		$this->staff_id = htmlspecialchars(strip_tags($this->staff_id));
		$this->password = htmlspecialchars(strip_tags(strval($this->password)));
		$this->gender = htmlspecialchars(strip_tags($this->gender));
		$this->first_name = htmlspecialchars(strip_tags($this->first_name));
		$this->last_name = htmlspecialchars(strip_tags(strval($this->last_name)));
		$this->dob = htmlspecialchars(strip_tags($this->dob));
		$this->address = htmlspecialchars(strip_tags($this->address));
		$this->role = htmlspecialchars(strip_tags($this->role));

		//bind data
		$stmt->bindParam(':first_name', $this->first_name);
		$stmt->bindParam(':last_name', $this->last_name);
		$stmt->bindParam(':staff_id', $this->staff_id);
		$stmt->bindParam(':gender', $this->gender);
		$stmt->bindParam(':dob', $this->dob);
		$stmt->bindParam(':address', $this->address);
		$stmt->bindParam(':role', $this->role);

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
					id =:staff_id';

		 //prepare statement
		 $stmt = $this->db_conn->prepare($query);
		 $stmt->bindParam(':id', $this->staff_id);

		 if ($stmt->execute()) {
			  return  true;
		 }

		 //error message incase someething goes wrong
		 printf("Error: %s.\n", $stmt->error);

		 return false;
	}


	public function read(){

       
        $query = 'SELECT
				s.first_name,
				s.last_name,
				s._staff_id,
				s._password,
				s._gender,
				s._dob,
				s._address,
				s._role
        
			FROM
				'.$this->table.' s
			';

        //prepare statement
        $stmt = $this->db_conn->prepare($query);


        //Execute query
        $stmt->execute();

        return $stmt->fetchAll();
    }

	public function read_by_id(){

       
        $query = 'SELECT
		s._staff_id,
        s.first_name,
        s.last_name,
        s._password,
        s._role
        
        FROM
        '.$this->table.' s
        WHERE id=?
        ';

        // prepare statement
        $stmt = $this->db_conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1,$this->staff_id);

        //Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

		//set properties
		$this->staff_id = $row['_staff_id'];
		$this->password = $row['_password'];
		$this->role = $row['_role'];
		$this->first_name =$row['first_name'];
		$this->last_name =$row['last_name'];
		$this->address = $row['_address'];
		$this->dob =$row['_dob'];
		$this->gender =$row['_gender'];

    }

	 public function register(){
		 //Insert query
		$query = 'UPDATE ' 
			. $this->table . '
		SET
			password = :password
		WHERE
			id = :staff_id
			';
	//prepare statement
	$stmt = $this->db_conn->prepare($query);

	//clean data
	$this->staff_id = htmlspecialchars(strip_tags($this->staff_id));
	$this->password = htmlspecialchars(strip_tags($this->password));

	//bind data
	$stmt->bindParam(':staff_id', $this->staff_id);
	$stmt->bindParam(':password', $this->password);

	//excecute query
	if($stmt->execute()){
		return  true;
	}

	//error message incase someething goes wrong
	printf("Error: %s.\n", $stmt->error);
	
	return false;

	 }

	 public function confirm_id(){

       
		$query = 'SELECT
		
		s._staff_id,
		s._password
		
		FROM
		'.$this->table.' s
		WHERE _staff_id=?
		';

		// prepare statement
		$stmt = $this->db_conn->prepare($query);

		// Bind ID
		$stmt->bindParam(1,$this->staff_id);

		//Execute query
		$stmt->execute();

		$num = $stmt->rowCount();

		if($num == 1){
			return true;
		}

		return false;
  }

 

	 public function read_by_id_and_password(){

       
        $query = 'SELECT
		            s.id,
					s.first_name,
					s.last_name,
					s.password,
					s.role
			
				FROM
					'.$this->table.' s
				WHERE 
					id=? AND password=?
				';

        // prepare statement
         $stmt = $this->db_conn->prepare($query);

         // Bind ID and Password
         $stmt->bindParam(1,$this->staff_id);
			$stmt->bindParam(2,$this->password);

        //Execute query
         $stmt->execute();

			$count = $stmt->rowCount();
			
			if($count == 1){

				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				//set properties
				$this->staff_id = $row['id'];
				$this->first_name =$row['first_name'];
				$this->last_name =$row['last_name'];
				$this->password = $row['password'];
				$this->role = $row['role'];
				

				return true;
			}

			return false;
   }

}

?>