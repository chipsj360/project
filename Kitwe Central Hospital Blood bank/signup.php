<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
   
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>Sign Up</title>
  </head>
<body>
<div class="body-container ">
  <div class="container">
  <center>
    <div class="logo">
                <img src="./log.png " alt="Company Logo" srcset="">
            </div>
  </center>
    <div class="title">Sign Up</div>
    <div class="content">
    <form class="row g-3" method="POST" action="services/donor_services.php">
    <div class="user-details">
<div class="input-box">

<input type="text" class="form-control" id="" placeholder="First Name" name="firstname" required>
</div>
<div class="input-box">

  <input type="text" class="form-control" placeholder="Surname" id="inputPassword4" name="lastname" reqired>
</div>
<div class="input-box">
 
  <input type="text" class="form-control"  placeholder="Sex" name="gender" reqired>
</div>
<div class="input-box">
  
  <input type="date" class="form-control" placeholder="Date of Birth" id="dob" name="dob" reqired >
</div>

<div class="input-box">
  
  <input type="tel" class="form-control" placeholder="Contact" name="contact" reqired>
</div>

<div class="input-box">
 
  <input type="number" class="form-control" placeholder="Weight" name="weight" required>
</div>

<div class="input-box">
  
  <input type="text" class="form-control" placeholder="Username" name="username" reqired>
</div>


<div class="input-box">
  <input type="password" class="form-control" placeholder="Password" name="password" required>
</div>
<div class="input-box">
<select class="form-select form-select-md" name="bloodgroup" required>
<option selected>--Select Blood Group--</option>
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

</div> 
<div class="button">
          <input type="submit" value="Sign Up">
        </div>
</div>

</form>

    </div>
  </div>
  </div>
</body>
</html>
