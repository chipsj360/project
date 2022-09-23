<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Login
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Staff</a></li>
            <li><a class="dropdown-item" href="../login.php">Donor</a></li>
            
          </ul>
        </li>
      </ul>
      <button class="btn btn-outline-primary mobile" onclick="location.href='<?php if (!isset($_SESSION['name'])) { echo 'login.php';} else {echo 'services/authentication.php?logout=1';} ?>';" type="button"><?php if (isset($_SESSION['name'])) {
                                                                                                                        echo $_SESSION['name'];
                                                                                                                    } else {
                                                                                                                        echo "Sign in";
                                                                                                                    } ?></button> 

    </div>
  </div>
</nav>