<?php

include_once 'config/dbconnect.php';
include_once 'repository/Donor_repository.php';

$database = new dbconnect();
$db = $database->connect();
$donor=new DonorRepository($db);


$donor_id='';
$first_name = '';
$last_name = '';
$donor_id = '';
$blood_group='';
$phone_number='';
$gender = '';
$date='';
$weight='';
$user_name='';
$phone_number='';

if(isset($_GET['edit'])){
    $donor->donor_id = $_GET['edit'];
    $donor->read_by_id();
    $donor_id = $donor->donor_id;
    $first_name = $donor->first_name;
    $last_name = $donor->last_name;
    $blood_group = $donor->blood_group;
    $phone_number = $donor->phone_number;
    $gender = $donor->gender;
    $date=$donor->dob;
    $weight=$donor->weight;
    $user_name=$donor->user_name;
    
    
}


?>