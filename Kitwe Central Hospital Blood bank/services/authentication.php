<?php

include_once '../config/dbconnect.php';
include_once '../repository/Donor_repository.php';
include_once '../repository/staff_repository.php';

$database=new dbconnect();

$db=$database->connect();

$donor=new DonorRepository($db);
$staff= new StaffRepository($db);

if(isset($_POST['login'])){

	if(isset($_POST['staff'])){
		$staff->staff_id = $_POST['username'];
		$staff->password = $_POST['password'];
		
		
		//check if password and username are correct
		if($staff->read_by_id_and_password()){
			session_start();
			$_SESSION['name'] = $staff->first_name . ' ' . $staff->last_name;
			$_SESSION['id'] = $staff->staff_id;
			$_SESSION['role'] = $staff->role;
			$_SESSION['login_message'] = null;

			header("Location: ../dashboard.php");
			exit();
			
			
		} else{
			session_start();
			$_SESSION['login_message'] = "Wrong username or password!";
			$_SESSION['lgn'] = 0;
			header("Location: ../login.php");
			exit();
		}
	} else {
		$donor->user_name= $_POST['username'];
		$donor->password = $_POST['password'];
		

		
		//insert the data
		if($donor->read_by_id_and_password()){
			session_start();
			$_SESSION['name'] = $donor->first_name . ' '.$donor->last_name;
			$_SESSION['id'] = null;
			$_SESSION['login_message'] = null;
			header("Location: ../dashboard.php");
			exit();
		} else{
			session_start();
			$_SESSION['login_message'] = "Wrong username or password!";
			$_SESSION['lgn'] = 0;
			header("Location: ../login.php");
			exit();
		}
	}
	
}


if(isset($_GET['logout'])){
	session_start();
	unset($_SESSION['name']);
	unset($_SESSION['role']);
	unset($_SESSION['id']);
	
	$_SESSION['lgout_msg'] = "Logged out successfully";
	$_SESSION['lgout'] = 0;
	header("Location: ../login.php");
	exit();
}


?>