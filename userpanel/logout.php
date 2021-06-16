<ul class="navbar-nav design" style="text-decoration: none; float:right;margin-right:50px">
      
      <li class="nav-item dropdown no-arrow" style="text-decoration: none; float:right">
               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span class="mr-2 d-none d-lg-inline text-gray-600 small text-uppercase"><?php echo $_SESSION['uname']." "; ?></span>
                 <img class="img-profile rounded-circle" style="width:30px;height:30px" src="..\adminpanel\img\icon.png">
               </a>
               <!-- Dropdown - User Information -->
               <div style="background-color:RGB(150,52,125);" class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                 
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="../index.php">
                   <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                   Logout
                 </a>
               </div>
             </li>
     </ul>  
   