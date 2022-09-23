<?php

include_once '../config/dbconnect.php';
include_once '../repository/Blood_repository.php';
include_once '../repository/test_repository.php';


$database = new dbconnect();
$db=$database->connect();

//Instatiate Staff repo object
$blood = new BloodRepository($db);
$results = new TestRepository($db);


if(isset($_POST['blood'])){
	$blood->donor_id = $_POST['donor_id'];
	
	$blood->blood_group = $_POST['bloodgroup'];
	
	$blood->donation_date = $_POST['collectiondate'];
	$blood->quantity = $_POST['pints'];
    
	
	//insert the data
	if($blood->insert()){
		session_start();
		$_SESSION['stts_msg'] = "Blood was added successfully";
		$_SESSION['msg_type'] = "success";
		header("Location: ../dashboard.php");
	} else{
		session_start();
		$_SESSION['stts_msg'] = "Could not add blood";
		$_SESSION['msg_type'] = "success";
		header("Location: ../donationform.php");
	}
}

if(isset($_POST['results'])){
	$results->blood_id=$_POST['blood_id'];
	$results->Hiv= $_POST['Hiv'];
	
	$results->Hepatitis_A= $_POST['Hepatitis-A'];
	$results->Hepatitis_B= $_POST['Hepatitis-B'];
	$results->Hepatitis_C = $_POST['Hepatitis-C'];
	
    if($results->insert()){
		session_start();
		$_SESSION['stts_msg'] = "Results added successfully";
		$_SESSION['msg_type'] = "success";
		header("Location: ../dashboard.php");
	}
}


?>