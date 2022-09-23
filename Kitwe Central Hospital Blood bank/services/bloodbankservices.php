<?php
include_once '../config/dbconnect.php';
include_once '../repository/BloodBank.php';
include_once 'Message.php';

$database = new dbconnect();
$db = $database->connect();

$bloodbank=new BloodBank($db);
$sms = new Message($db);

if (isset($_POST['bloodgroup'])) {
    $bloodbank->blood_group=$_POST['bloodgroup'];
    $bloodbank->quantity=$_POST['pints'];
	$availableblood=$bloodbank->get_total_by_bloodgroup();
	$quantity=$bloodbank->quantity=$_POST['pints'];


	if ($availableblood >$quantity) {


		if ($availableblood>2000) {

			if($bloodbank->dispenseblood()){
				session_start();
				$_SESSION['stts_msg'] = " blood dispensed successfully ";
				$_SESSION['msg_type'] = "success";
				$sms->set_status("true");
				
			
				header("Location: ../dispense.php");
			}else {
				session_start();
				$_SESSION['stts_msg'] = " failed to dispense ";
				$_SESSION['msg_type'] = "danger";
				
				header("Location: ../dispense.php");
			}


	}elseif($availableblood>1000) {
		
		$bloodbank->dispenseblood();
		session_start();
		$_SESSION['stts_msg'] = " Dispensed successfully ";
		$_SESSION['msg_type'] = "danger";
		$msg="hello donor";
		$sms->send($bloodbank->blood_group);
		header("Location: ../dispense.php");
		
	  }else {
		session_start();
		$_SESSION['stts_msg'] = " failed to dispense ";
		$_SESSION['msg_type'] = "danger";
		$sms->send($bloodbank->blood_group);	
	    header("Location: ../dispense.php");
	  }
	}else {
		session_start();
		$_SESSION['stts_msg'] = " inadequate blood ";
		$_SESSION['msg_type'] = "danger";
		$sms->send($bloodbank->blood_group);
		header("Location: ../dispense.php");
}
	 
}

?>