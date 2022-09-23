<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">KTCH BLOOD BANK</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../../dashboard.php">Dashboard</a>
        </li>
        
      </ul>
      
    

    </div>
    <button class="btn btn-outline-primary desktop" onclick="location.href='<?php if (!isset($_SESSION['name'])) {
                                                                                        echo '../../login.php';
                                                                                    } else {
                                                                                        echo '../../services/authentication.php?logout=1';
                                                                                    } ?>';" type="button"><?php if (isset($_SESSION['name'])) {
                                                                                                                echo $_SESSION['name'];
                                                                                                            } else {
                                                                                                                echo "Sign in";
                                                                                                            } ?></button>
  </div>
</nav>