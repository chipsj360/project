<!DOCTYPE html>
<html lang="en">
<?php
  session_start();

  if (!isset($_SESSION['name'])) {
  $_SESSION['lgn_msg'] = "You are not logged in, Please login first";
  $_SESSION['lgn'] = 0;
  header("Location: ../../login.php");
  }elseif (!isset($_SESSION['role'])) {
  $_SESSION['stts_msg'] = "Operation not allowed!";
  $_SESSION['msg_type'] = "danger";
  header("Location: ../../dashboard.php");
  } elseif ($_SESSION['role'] != 'ADMIN') {
  $_SESSION['stts_msg'] = "Operation not allowed!";
  $_SESSION['msg_type'] = "danger";
  header("Location: ../../dashboard.php");
  }
?>
<?php include_once 'services/blood_edit_services.php' ?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donation Form</title>
  <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/nav_1.css">
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>Donation Form</title>
  </head>
<body>
  
  
  <div class="container">
  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        
        <li class="input-box">
          <a class="nav-link active" href="dashboard.php">Dashboard</a>
        </li>
      </ul>
    <div class="title">Collecting Blood</div>
    <div class="content">
    <form class="row g-3" method="POST" action="services/bloodservices.php">
    <div class="user-details">
<div class="input-box">
  <label for="inputEmail4" class="form-label">UserId</label>
  <input type="text" <?php if(isset($_GET['blood'])) ?> value="<?php echo $donor_id ?>" class="form-control" id="" name="donor_id" readonly >
  </div> 
<div class="input-box">
<label for="pints" class="form-label">Quantity</label>
    <input type="number" class="form-control" placeholder="450 ml" name="pints" required >
</div>
<div class="input-box">
  <label for="inputAddress2" class="form-label">Date of Collection</label>
  <input type="date" class="form-control" id="dob" name="collectiondate" required>
</div>

<div class="input-box">
    <label for="inputAddress2" class="form-label">Blood Group</label>
    <input type="text" value="<?php echo $blood_group ?>"  class="form-control" id="" name="bloodgroup" readonly  >
</div>

<!-- <div class="col-12">
  <button type="submit" class="btn btn-danger"  style="border-radius:0%";>Register</button>
</div> -->
<div class="button">
          <input type="submit" value="Collect" name="blood">
        </div>
</div>

</form>
<script src="lib/js/bootstrap.bundle.min.js"></script>  

</body>
</html>