<?php
session_start();

if (!isset($_SESSION['name'])) {
    $_SESSION['lgn_msg'] = "You are not logged in, Please login first";
    $_SESSION['lgn'] = 0;
    header("Location: ../../login.php");
}
include_once '../../repository/Donor_repository.php';
include_once '../../config/dbconnect.php';
$database = new dbconnect();
$db = $database->connect();
$donor=new DonorRepository($db);
?>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../../lib/css/bootstrap.min.css">
  <!--link rel="stylesheet" href="../../src/nav.css"-->
  <link rel="stylesheet" href="../../src/dashboard.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | White Horse </title>-->
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
	  
      <span class="logo_name">KTHBD</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class='bx bx-box' ></i>
            <span class="links_name">Donation</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name" href="list-messages" aria-controls="list-donor" >Blood</span>
          </a>
        </li> -->
        
        <!-- <li>
          <a href="#">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Stock Level</span>
          </a>
        </li> -->
        
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name" a href="google.com">Notification</span>
          </a>
        </li>
       
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>        
        <li class="log_out">
          <a href="../../login.php">
            <i class='bx bx-log-out'></i>
            <!-- <a class="nav-link active" aria-current="page" href="index.php">Home</a> -->
            <span class="links_name">Log out</span>
            <a class="dropdown-item" href="../../login.php"><i class="bx bx-log-out"></i> Sign Out</a>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"> Donors Dashboard</span>
      </div>
      
     <div class="">
       
	    <button class="btn btn-outline-secondary desktop" onclick="location.href='<?php if (!isset($_SESSION['name'])) {
          echo '../../login.php';
            } else {
                  echo '../../services/authentication.php?logout=1';
              } ?>';" type="button"><?php if (isset($_SESSION['name'])) {
                    echo $_SESSION['name'];                                                                                     } else {
                      echo "Sign in";
                      } ?></button>
                              
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <!-- <div class="box-topic">Donors</div> -->
            <!-- <div class="number"></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from Last Year</span>
            </div> -->
          </div>
          <!-- <i class='bx bx-cart-alt cart'></i> -->
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Importance of Blood Donation</div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          
        </div>
          <div class="sales-details">
            <p>
            Maintaining diversity in the blood supply is essential. Some blood types are quite rare and are likeliest to
             be found among people with shared ancestral origins. Visit our Blood and Diversity page for more information on the need for diversity in the blood supply.

          <br>Why CMV Negative Blood is Important
          CMV is known as the cytomegalovirus. CMV is a flu-like virus to which an estimated 85% of adults in the United States will be exposed by the age of 40. This means that the majority of adults in the United States carry CMV antibodies. Unfortunately, these antibodies might pose a danger to particularly vulnerable patients. That’s why CMV-negative blood is preferred for use in some cases.

          In a medical setting, CMV-negative blood may be utilized for transfusions for 
          pediatric-specific conditions for newborns and premature babies, as well as for 
          immune-compromised adults.

          Blood Donation Types
          Blood donations can yield a variety of blood products, including red cells, platelets and plasma. You may be most familiar with the typical whole blood donation drive seen at workplaces, schools and community events, but there are a few other ways to help give more life through the Red Cross.
          </p>
          
      </div>
          <div class="button">
            <!--a href="#"></!--a-->
          </div>
       </div>
        
      </div>
    </div>
  </section>


<script src="../../lib/js/bootstrap.bundle.min.js"></script>
<!-- JavaScript Bundle with Popper -->
</body>
</html>