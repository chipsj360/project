<?php

include_once '../config/dbconnect.php';
include_once '../repository/Donor_repository.php';

//Instatiate DB & connect
$database = new dbconnect();
$db = $database->connect();


$donor=new DonorRepository($db);

//get submitted data
if (isset($_POST['firstname'])) {
	
	$donor->first_name = $_POST['firstname'];
	$donor->last_name = $_POST['lastname'];
	$donor->gender = $_POST['gender'];
	$donor->dob = $_POST['dob'];
	$donor->blood_group= $_POST['bloodgroup'];
	$donor->phone_number = $_POST['contact'];
	$donor->weight = $_POST['weight'];
	$donor->user_name= $_POST['username'];
	$donor->password = $_POST['password'];
	
    $m=date('y');
	$m-2;
	$md=rand(1,1000);
    
    $donor->donor_id=$m.$md;

	if($donor->insert()){
		session_start();
		$_SESSION['stts_msg'] = " was added successfully";
		$_SESSION['msg_type'] = "success";
		header("Location: ../login.php");
	} else{
		session_start();
		$_SESSION['stts_msg'] = "could not add donor";
		$_SESSION['msg_type'] = "danger";
		header("Location: ../donor.php");
	}    
		}
	
//get data to delete
if (isset($_GET['delete'])) {
	
$donor->donor_id = $_GET['delete'];
if ($donor->delete()) {
	session_start();
    $_SESSION['stts_msg'] = "Donor was deleted successfully";
	$_SESSION['msg_type'] = "success";
	header("Location: ../dashboard.php");
	} else {
	session_start();
	$_SESSION['stts_msg'] = "Could not delete child";
	$_SESSION['msg_type'] = "danger";
	header("Location: ../dashboard.php");
	exit();
	}
}

//get submitted data
if(isset($_POST['update'])){
	$donor->donor_id = $_POST['donor_id'];
	$donor->first_name = $_POST['first_name'];
	$donor->last_name = $_POST['last_name']; 
	$donor->blood_group = $_POST['bloodgroup'];
	$donor->dob = $_POST['dob'];
	$donor->phone_number= $_POST['contact'];
	$donor->weight = $_POST['weight'];
	$donor->gender = $_POST['gender'];
	
	
	//insert the data
	if($donor->update()){
		session_start();
		$_SESSION['stts_msg'] = "Donor details updated successfully";
		$_SESSION['msg_type'] = "success";
		header("Location: ../dashboard.php");
	} else{
		session_start();
		$_SESSION['stts_msg'] = "Could not update Donor";
		$_SESSION['msg_type'] = "success";
		header("Location: ../dashboard.php");
	}
}



if (isset($_GET['donor_id'])) {
	session_start();
	$_SESSION['donor_id'] = $_GET['donor_id'];
	header("../donationform.php");
	exit();
}

if(isset($_GET['search']))
             {
			$donor->filtervalues = $_GET['search'];
                                       
             }



?>