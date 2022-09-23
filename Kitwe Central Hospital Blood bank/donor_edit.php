
<!DOCTYPE html>

<html lang="en" dir="ltr">
<?php include_once 'services/donor_edit_services.php' ?>
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>Donor's Form</title>
  </head>
<body>
  <div class="container">
    <div class="title">Adding Donor</div>
    <div class="content">
    <form class="row g-3" method="POST" action=" services/donor_services.php">
    <div class="user-details">
	


<div class="input-box">
<label for="inputEmail4" class="form-label">Donor Id</label>
<?php if(isset($_GET['edit'])){?>
<input type="number" value="<?php echo $donor_id ?>" placeholder="" class="form-control d-none" name="donor_id" id="inputnumber" required>
 <?php }?>
</div>
<div class="input-box">
<label for="inputPassword4" class="form-label">First Name</label>
  <input type="text" value="<?php echo $first_name ?>" placeholder="Enter first name" class="form-control" id="first_name" name="first_name" required>
</div>
<div class="input-box">
<label for="inputPassword4" class="form-label">Last Name</label>
  <input type="text" value="<?php echo $last_name ?>" placeholder="Enter last name" class="form-control" id="lastname" name="last_name" required>
</div>
<div class="input-box">
  <label for="inputAddress" class="form-label">Gender</label>
  <input type="text" value="<?php echo $gender ?>" class="form-control" id="dob" name="gender" required >
</div>
<div class="input-box">
  <label for="inputAddress2" class="form-label">Date of Birth</label>
  <input type="date" value="<?php echo $date ?>" class="form-control" id="dob" name="dob" required >
</div>

<div class="input-box">
  <label for="phonenumber" class="form-label">Phone Number</label>
  <input type="tel" value="<?php echo $phone_number ?>" class="form-control" id="phone_number"  required name="contact">
</div>

<div class="input-box">
  <label for="weight" class="form-label">Weight</label>
  <input type="number" value="<?php echo $weight ?>" class="form-control" id="weight" name="weight" required >
</div>

<div class="input-box">
  <label for="username" class="form-label">User Name</label>
  <input type="text" value="<?php echo $user_name ?>" class="form-control" id="username" name="username" required>
</div>

<div class="col-md-10">
<select class="form-select form-select-md" name="bloodgroup" required>
<option selected>bloodgroup</option>
<option <?php if($blood_group == "A+"){echo 'selected';} ?> value="A+">A+</option>
<option <?php if($blood_group == "A-"){echo 'selected';} ?>  value="A-">A-</option>
<option <?php if($blood_group == "B+"){echo 'selected';} ?>  value="B+">B+</option>
<option <?php if($blood_group == "B-"){echo 'selected';} ?>  value="B-">B-</option>
<option <?php if($blood_group == "AB+"){echo 'selected';} ?>  value="AB+">AB+</option>
<option <?php if($blood_group == "AB-"){echo 'selected';} ?>  value="AB-">AB-</option>
<option <?php if($blood_group == "O+"){echo 'selected';} ?>  value="O+">O+</option>
<option <?php if($blood_group == "O-"){echo 'selected';} ?>  value="O">O-</option>
</select>
</div>



<div class="button">
          <input type="submit" value="Update" name="update">
        </div>
</div>

</form>

      
    </div>
  </div>
</body>
</html>