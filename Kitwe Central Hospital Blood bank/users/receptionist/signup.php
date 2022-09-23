<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
</head>
<body>
<div class="container ">
<div class="row d-flex justify-content-center align-items-center h-100">
         <div class="col-md-4" >

                <div class="form p-8">
                    <form class="row g-3" method="POST" action="services/donor_services.php" >
                        <h3>Sign up</h3>
                        <div class="alert-danger p-2 rounded-3 col-md-12 alert status" id="AlertBox" style="display: <?php if(isset($_SESSION["lgn_msg"])){if($_SESSION["lgn"] == 0){echo "block";} else {echo "none";}} else {echo "none";} ?>;"><?php if(isset($_SESSION["lgn_msg"])){echo $_SESSION['lgn_msg']; $_SESSION['lgn'] += 1;} ?></div>
                        <div class="col-md-12">
                            <label for="full name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id=" fullname" placeholder="Chansa Mulenga" name="fullname">
                        </div>

                        <div class="col-md-12">
                            <label for="Gender" class="form-label">Gender</label>
                            <input type="text" class="form-control"  placeholder="Male or Female" name="gender">
                        </div>

                        <div class="col-md-12">
                            <label for="dob" class="form-label">Date of birth</label>
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div>

                        <div class="col-md-12">
                            <label for="blood group" class="form-label">Blood Group</label>
                            <input type="text" class="form-control"  placeholder="B+" id="bloodgroup" name="bloodgroup">
                        </div>

                        <div class="col-md-12">
                            <label for="inputusername" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="contact" name="contact">
                        </div>

                        <div class="col-md-12">
                            <label for="weight" class="form-label">Weight</label>
                            <input type="number" class="form-control" id="weight" name="weight">
                        </div>

                        <div class="col-md-12">
                            <label for="inputusername" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>

                        <div class="col-md-12">
                            <label for="inputpassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="inputpassword">
                        </div>

                        <button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%";>register</button>
                    </form>

                    <div class="text-center mt-4">Already registered? <a href="login.php">Sign in</a></div> 
                </div>
            </div>

        </div>

    </div>
</div>
</div>
</div>
</body>
</html>