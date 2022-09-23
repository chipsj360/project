<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page </title>
    <link rel="stylesheet" href="stylelogin.css">
</head>
  
<body>
 <center> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">Dashboard</a>
        </li>
</center>
<section class="header">    
<div class="body-container ">
<div class="container">
            <div class="logo">
                <img src="./log.png " alt="Company Logo" srcset="">
            </div>
<div class="row d-flex justify-content-center align-items-center h-100">
<div class="col-8">
<div class="form p-5">
    <form class="row g-3" method="POST" action="services/authentication.php">
        <h2>Sign in</h2>
        <div class="alert-success p-2 rounded-3 col-md-12 alert status" id="Alert" style="display: <?php if(isset($_SESSION["lgout_msg"])){if($_SESSION["lgout"] == 0){echo "block";} else {echo "none";}} else {echo "none";} ?>;"><?php if(isset($_SESSION["lgout_msg"])){echo $_SESSION['lgout_msg']; $_SESSION['lgout'] += 1;} ?></div>
        <div class="alert-danger p-2 rounded-3 col-md-12 alert status" id="AlertBox" style="display: <?php if(isset($_SESSION["lgn_msg"])){if($_SESSION["lgn"] == 0){echo "block";} else {echo "none";}} else {echo "none";} ?>;"><?php if(isset($_SESSION["lgn_msg"])){echo $_SESSION['lgn_msg']; $_SESSION['lgn'] += 1;} ?></div>
        <div class="form-item">
            <!-- <label for="inputusername" class="form-item">Username</label> -->
            <input type="text" class="form-control" id="inputusername" name="username" placeholder="Username or Email" required>
        </div>
        <div class="form-item">
            
            <input type="password" name="password" class="form-control" id="inputpassword" placeholder="Password" required>
        </div>
        <div><input type="checkbox" class="form-inline-check form-check-input" value="staff" name="staff[]">  Staff</div>
        
        <div class="form-btns">
            <button type="submit" name="login" class="btn btn-primary col-12" onclick="onSubmitDetails(event)">Login</button>
        </div>
    </form>
     <div class="text-center mt-4">Not registered yet? <a href="signup.php">Sign up</a></div> 
    

   
</div>
</div>
</div>
</div>



  </div>

</section>
</div>
<script src="src/js/login.js"></script>
</body>
</html>