<!DOCTYPE html>
<html lang="en">
<?php

session_start();

if (!isset($_SESSION['name'])) {
    $_SESSION['lgn_msg'] = "You are not logged in, Please login first";
    $_SESSION['lgn'] = 0;
    header("Location: ../../login.php");
} elseif (!isset($_SESSION['role'])) {
    $_SESSION['stts_msg'] = "Operation not allowed!";
    $_SESSION['msg_type'] = "danger";
    header("Location: ../../dashboard.php");
}


include_once '../../config/dbconnect.php';
include_once '../../repository/Donor_repository.php';
include_once '../../repository/test_repository.php';
include_once '../../repository/Blood_repository.php';



$database = new dbconnect();
$db = $database->connect();



$donor = new DonorRepository($db);
$result = new TestRepository($db);
$blood = new BloodRepository($db);

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
	  
      <span class="logo_name">KTHB</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class='bx bx-box' ></i>
            <span class="links_name">Donor</span>
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
	  
	   <div class="search-box">
          
            <div class="row">
              <div class="col-md-8">
                <form action="../../services/donor_services" method="GET">
                  <div class="input-group mb-1">
                    <input type="text" name="search" required class="form-control" placeholder="Search donor" id="data-search">
                  </div>
                </form>
              </div>
            </div>
         
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
       <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="recent-sales box">
                              <div class="title"><h2>Donors</h2></div>
                              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                              <button class="btn btn-outline-dark ml" onclick="location.href='../../donor.php'">+ Add New</button>
                              
                              </div>
                              <div class="sales-details">
                            <table class="table table-hover caption-top table-responsive table-borderless" id="donors">          
                            <div class="button">                       
                            </div> 
        <table class="table table-striped table-bordered zero-configuration" id="donors">          
          <div class="button">                       
          </div>                    
        </div>
          <thead>
            <tr class="heade">
              <th>User Id</th>
              <th>Full Names</th>
              <th>Sex</th>
              <th>DOB</th>
              <th>B.Group</th>
              <th>Contact</th>
              <th>Weight</th>
              <th>Username</th>
            </tr>
          </thead>
          <tbody class="tbody">
            <?php
            $donors = $donor->read();
            //$donors = $donor->search_read();
            foreach ($donors as $donorz) { ?>
              <tr class="text-center">
                <td><?php echo $donorz['donor_id']; ?></td>
                <td><?php echo ucwords($donorz['first_name'] . " " . $donorz['last_name']); ?></td>
                <td><?php echo $donorz['gender']; ?></td>
                <td><?php echo $donorz['dob']; ?></td>
                <td><?php echo $donorz['blood_group']; ?></td>
                <td><?php echo $donorz['phone_number']; ?></td>
                <td><?php echo $donorz['weight']; ?></td>
                <td><?php echo ucwords($donorz['user_name']); ?></td>
                <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    
                                    
                               </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>	  

     
    
      </div>
    </div>
  </section>

          <script>
          let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
          sidebar.classList.toggle("active");
          if(sidebar.classList.contains("active")){
          sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
        }else
          sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
        </script>


 
      

          
        <a href="../../dispense.php" class="btn btn-warning  float-right">Dispense</a>
        <script type="text/javascript" src="jquery.min.js"> </script>
        <script type="text/javascript" src="chart.min.js"> </script>
        <script>
          const search = document.getElementById('data-search');
          // Search the table 
          search.addEventListener("keyup", function() {
            var keyword = this.value;
            keyword = keyword.toUpperCase();
            var table_3 = document.getElementById("donors");
            var all_tr = table_3.getElementsByTagName("tr");
            for (var i = 0; i < all_tr.length; i++) {
              var all_columns = all_tr[i].getElementsByTagName("td");
              for (j = 0; j < all_columns.length; j++) {
                if (all_columns[j]) {
                  var column_value = all_columns[j].textContent || all_columns[j].innerText;
                  column_value = column_value.toUpperCase();
                  if (column_value.indexOf(keyword) > -1) {
                    all_tr[i].style.display = ""; // show
                    break;
                  } else {
                    all_tr[i].style.display = "none"; // hide
                  }
                }
              }
            }
          })
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
                    color.push(data[count].color); }
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
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
    </div>
  </div>
 
  <script src="../../lib/js/bootstrap.bundle.min.js"></script>
  <!-- JavaScript Bundle with Popper -->
</body>

</html>