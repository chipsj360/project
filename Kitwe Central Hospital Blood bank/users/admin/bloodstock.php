<!DOCTYPE html>
<?php 
session_start();

if (!isset($_SESSION['name'])) {
    $_SESSION['lgn_msg'] = "You are not logged in, Please login first";
    $_SESSION['lgn'] = 0;
    header("Location: ../../login.php");
}
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../../lib/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../src/nav.css">
  <link rel="stylesheet" href="../../src/dashboard.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
</head>
<body>
<div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
	  
      <span class="logo_name">KTHB</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="dashboard.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Donor</span>
          </a>
        </li>
        <li>
          <a href="viewblood.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name" href="list-messages" aria-controls="list-donor" >Results</span>
          </a>
        </li>
        
        <li>
          <a href="bloodstock.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Stock Level</span>
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
        <span class="dashboard">Dashboard</span>
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
    <br><br><br>
 <div class="container-fluid ">
          <div class="row">
            <div class="">
              <div class="card mt-4 mb-4 mx-auto" style="width: 40rem;">
                <div class="card-header"><h2>Available Blood</h2></div>
                <div class="card-body">
                  <div class="chart-container pie-chart">
                    <canvas id="myChart"></canvas>
                  </div>
				  <a href="../../dispense.php" class="btn btn-secondary  float-right">Dispense</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript" src="jquery.min.js"> </script>
        <script type="text/javascript" src="chart.min.js"> </script>
        <script>
        $(document).ready(function() {
            makechart();
                function makechart() {
              $.ajax({
                url: "chart.php",
                method: "GET",
                dataType: "JSON",
                success: function(data) {
                  var blood_group = [];
                  var total = [];
                  var color = [];
                  for (var count = 0; count < data.length; count++) {
                    blood_group.push(data[count].blood_group);
                    total.push(data[count].total);
                    color.push(data[count].color);
                  }
                  var group_chart1 = $('#myChart');
                  var graph1 = new Chart(group_chart1, {
                    type: 'bar',
                    data: {
                      labels: blood_group,
                      datasets: [{
                        label: '# blood units',
                        data: total,
                        backgroundColor: color
                      }]
                    },
                    options: {
                      responsive: true,
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                }
              })
            }

          });
        </script>		        
</body>
</html>


