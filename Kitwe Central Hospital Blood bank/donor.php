
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>Registration Form</title>
  </head>
<body>
  <div class="container">
    <div class="title">Adding Donor</div>
    <div class="content">
    <form class="row g-3" method="POST" action="services/registration_services.php">
    <div class="user-details">
 <div class="input-box">
<label for="inputEmail4" class="form-label">First Name</label>
<input type="text" class="form-control" id="" name="firstname" required>
</div>

<div class="input-box">
<label for="inputPassword4" class="form-label">Last Name</label>
  <input type="text" class="form-control" id="inputPassword4" name="lastname" required>
</div>

<div class="input-box">
  <label for="inputAddress" class="form-label">Gender</label>
  <input type="text" class="form-control"  placeholder="Male or female" name="gender" required>
</div>

<div class="input-box">
  <label for="inputAddress2" class="form-label">Date of Birth</label>
  <input type="date" class="form-control" id="dob" name="dob" required >
</div>

<div class="input-box">
  <label for="phonenumber" class="form-label">Phone Number</label>
  <input type="tel" class="form-control" name="contact" required>
</div>

<div class="input-box">
  <label for="weight" class="form-label">Weight</label>
  <input type="number" class="form-control" placeholder="50" name="weight" required>
</div>

<div class="input-box">
  <label for="username" class="form-label">User Name</label>
  <input type="text" class="form-control" placeholder="" name="username" required>
</div>


<div class="input-box">
  <label for="username" class="details">Password</label>
  <input type="password" class="form-control" placeholder="" name="password" required>
</div>

<div class="col-md-10">
<select class="form-select form-select-md" name="bloodgroup">
<option selected>bloodgroup</option>
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


<!-- <div class="col-12">
  <button type="submit" class="btn btn-danger"  style="border-radius:0%";>Register</button>
</div> -->
<div class="button">
          <input type="submit" value="Add Donor">
        </div>
</div>

</form>

      <!--form action="#"--> 
      <!-- <form class="row g-3" method="POST" action="services/registration_services.php">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form> -->
    </div>
  </div>
</body>
</html>
