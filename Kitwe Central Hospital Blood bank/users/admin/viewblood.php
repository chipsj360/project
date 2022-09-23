
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
} elseif ($_SESSION['role'] != 'ADMIN') {
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

  
 
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<?php
include_once '../../config/dbconnect.php';
include_once '../../repository/Donor_repository.php';
include_once '../../repository/test_repository.php';
include_once '../../repository/Blood_repository.php';
?>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Blood</title>
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
          <a href="" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="dashboard.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Donors</span>
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
	  
	   
 

     <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      -->
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
                              <div class="title"></div>
                              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                              
                              
                              </div>
                              <div class="sales-details">
                            <table class="table table-hover caption-top table-responsive table-borderless" id="donors">          
                            <div class="button">                       
                            </div> 
        <table class="table table-hover caption-top table-responsive table-borderless" id="donors">          
          <div class="button">                       
          </div>                    
        </div>
        <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>First Name</th>
                                                <th>Surname</th>
                                                <th>Blood Group</th>
                                                <th>Date of Collection</th>
                                                <th>Quantity</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tbody>
            <?php $bloodz = $blood->read();
            foreach ($bloodz as $blood_item) { ?>
              <tr>
                <td><?php echo $blood_item['blood_id']; ?></td>
                <td><?php echo $blood_item['first_name']; ?></td>
                <td><?php echo $blood_item['last_name']; ?></td>
                <td><?php echo $blood_item['blood_group']; ?></td>
                <td><?php echo $blood_item['donation_date']; ?></td>
                <td><?php echo $blood_item['quantity']; ?></td>
                <td><?php
                    if ($blood_item['results_id'] == NULL) {
                      /*echo '<span href="../../results.php?blood=<?php echo $blood_item['blood_id']; ?>" class=""btn btn-primary'>Enter Results </span>';*/
                      echo "<a href=\"../../results.php?result={$blood_item['blood_id']}\" class='btn btn-primary' >Enter Results </a>";
                    } else {
                      if ($result->read_by_id($blood_item['results_id'])) {
                        if ($result->Hiv == 'Negative' && $result->Hepatitis_A == 'Negative' && $result->Hepatitis_B == 'Negative' && $result->Hepatitis_C == 'Negative') {
                          echo "<span class ='btn btn-primary'>Approved</span>";
                        } else {
                          echo "<span class = 'btn btn-danger'>Rejected</span>";
                        }
                      } else {
                        echo "<span class = 'btn btn-danger'>Error</span>";
                      }
                    }
                    ?></td>
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