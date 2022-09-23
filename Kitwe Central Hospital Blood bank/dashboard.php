<?php 

	session_start();

	if(isset($_SESSION['name'])){

		if(isset($_SESSION['role'])){
			if($_SESSION['role'] == 'ADMIN'){
			
				header("Location: users/admin/dashboard.php");
				exit();
			} else {
			
				header("Location: users/receptionist/dashboard.php");
				exit();
			}
			
		} else {
			
			header("Location: users/donor/dashboard.php");
			exit();
		}
  	} else {
	  	$_SESSION['lgn_msg'] = "You are not logged in, Please login first";
		$_SESSION['lgn'] = 0;
		header("Location: login.php");
		exit();
  	}

?>