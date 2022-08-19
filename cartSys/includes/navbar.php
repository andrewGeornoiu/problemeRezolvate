<?php
// $conn = OpenCon();
// $query = "SELECT cantitate FROM cart_item";
// $result = mysqli_query($conn, $query);
// CloseCon($conn);
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarCenteredExample"
            aria-controls="navbarCenteredExample"
            aria-expanded="false"
            aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div
            class="collapse navbar-collapse justify-content-center"
            id="navbarCenteredExample"
    >
      <!-- Left links -->
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Produse
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Desktops</a></li>
            <li><a class="dropdown-item" href="#">Laptops</a></li>
            <li><a class="dropdown-item" href="#">Componente</a></li>
          </ul>
        </li>

        <?php if(isset($_SESSION['username'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <?php  } else { ?>
          <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
          <?php } ?>

        <li class="nav-item">
          <a class="nav-link" href="sign_up.php">Sign Up </a>
        </li>
        <?php if(isset($_SESSION['username'])) { ?>
        <li class="nav-item">
         <a class="nav-link" href="#"> <?php echo   "| " .  " Conectat ca " . $_SESSION['username']; ?></a>
        </li>
        <?php  } ?>

        <li class="nav-item">
          <a href="cart.php">
             <i class="fa-solid fa-cart-shopping mt-3" style="color:white"></i>
             <span id= "cartCounter" class="text-light">0</span>
          </a>
        </li>
        
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>