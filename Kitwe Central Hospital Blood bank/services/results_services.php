<?php


	//the two dots because it is in the root folder
	include_once 'config/dbconnect.php';
	include_once 'repository/Blood_repository.php';
	include_once 'repository/test_repository.php';

	//Instatiate DB & connect
	$database = new dbconnect();
	$db=$database->connect();

	//Instatiate  donorRepository object
	$blood = new BloodRepository($db);
	$result = new TestRepository($db);


		//initializing variables to be added to the form
		
    $blood_id = '';
    $blood_group='';
       
		
	
		


		//getting data to edit
	if(isset($_GET['result'])){
        $result->blood_id= $_GET['result'];
        
        $blood_id=$result->blood_id;
		
		
}

?>