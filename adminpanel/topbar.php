<?php
session_start();

if ($_SESSION['adminpanel']=="access" && !isset($_SESSION['userpanel'])){
//echo "<script>alert('Session ".$adm."')</script>";
 

?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <h3 class="font-weight-bold text-primary ">Admin Panel</h3>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

         

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small text-uppercase"><?php echo $_SESSION['uname']." "; ?></span>
                <img class="img-profile rounded-circle" src="img\admin.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               
                <a class="dropdown-item"  href="../index.php">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <?php 
}else{
  echo "<script>window.location.replace('../index.php');</script>";
}
        ?>