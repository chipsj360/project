<?php


	//the two dots because it is in the root folder
	include_once 'config/dbconnect.php';
	include_once 'repository/Blood_repository.php';
	include_once 'repository/Donor_repository.php';

	//Instatiate DB & connect
	$database = new dbconnect();
	$db=$database->connect();

	//Instatiate  donorRepository object
	$blood = new BloodRepository($db);
	$donor = new DonorRepository($db);


		//initializing variables to be added to the form
		$first_name = '';
		$last_name = '';
		$donor_id = '';
        $blood_group='';
        $phone_number='';
		$gender = '';
		$date=date('Y-m-d');
	
		


		//getting data to edit
	if(isset($_GET['blood'])){
		$donor->donor_id = $_GET['blood'];
		$donor->read_by_id();
         
		$donor_id = $donor->donor_id;
		$first_name = $donor->first_name;
		$last_name = $donor->last_name;
		$blood_group = $donor->blood_group;
		$phone_number = $donor->phone_number;
		$gender = $donor->gender;
		
		
}

?>