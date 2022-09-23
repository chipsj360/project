<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
<?php include_once 'services/blood_edit_services.php' ?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dispense</title>
  <!-- <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/nav_1.css"> -->
    <link rel="stylesheet" href="stylelogin.css">
</head>
<body>
 <div class="m-3">
 <center> 
  <h2 class="text-center">Dispensing Blood</h2>
  
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">Dashboard</a>
        </li>
    
</center>
<div class="container m-top radius overflow-hidden  shadow-sm bg-white max-width">      

 <form class="row g-3" method="POST" action="services/bloodbankservices.php">
  
  <div class="alert-danger p-2 rounded-3 col-md-12 alert status" id="AlertBox" style="display: "><?php if(isset($_SESSION["stts_msg"])){echo $_SESSION['stts_msg']; $_SESSION['msg_type'] ;} ?></div>
    <div class="form-item">    
    <input type="number"class="form-control" id="inputusername" placeholder="Quantity 470 ml" name="pints">
  </div>
  <div class="form-item">
    <select class="form-select form-select-md" name="bloodgroup">
    <option selected>Select Blood Group</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O+">O+</option>
    <option value="O">O-</option>
  </select>
    </div>
  
  <div class="form-btns">
    <button type="submit" class="btn btn-warning"   onclick="onSubmitDetails(event)"  name="blood">Dispense</button>
  </div>
  
</form>
 
  </div>
 </div>
</div>
<script src="lib/js/bootstrap.bundle.min.js"></script>  

</body>
</html>