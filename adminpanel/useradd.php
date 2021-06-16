
<?php include '..\sqlquries\connection.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sound.com</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <?php include 'sidebar.php';?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'topbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Register </h1>
          </div>

          <!-- Content Row -->
           <div class="row">

           <div class="offset-md-2 col-md-8 col-sm-12" >
            
           <div class="shadow p-3 mb-5 bg-white rounded" style="padding: 15px;">
           <h3 class="text-center"style>Enter User Data</h3>
           <p class="text-center">Create User account. It's only takes a minute.</p>
           <hr><br>
           <form method="post">
           <div class="row">
           <?php 
           $check=false;
           if(isset($_POST['btn'])){
             
             $uname=$_POST['uname']??"";

             $query="SELECT * FROM user_table WHERE userName='$uname';";
            // $result=mysqli_query($conn,$query);
             $result = mysqli_query($conn,$query);
            
             if(mysqli_fetch_row($result)>0){
              echo "<div class='offset-md-2 col-md-8 col-sm-12' >
              <p class='text-center' style='color:red'>*User name already exist.Please change user name</p>
               </div>";
             }else {
              $check=true;
             }
             
            //$_POST['psmg'] = "Hello";
            
        }
        ?>
          
           <div class="offset-md-2 col-md-4 col-sm-12" >
             <input style="margin:5px; padding:5px;" required name="fname" id="fname" placeholder="First Name" onchange="return username()" type="text" class="form-control">
             </div>
             <div class=" col-md-4 col-sm-12" >
               <input style="margin:5px; padding:5px;" required name="lname"   type="text" id="lname" placeholder="Last Name" onchange="return username()" class="form-control">
               </div>
             <div class="offset-md-2 col-md-8" >
               <input style="margin:5px; padding:5px;" required name="email"  type="email"  placeholder="Email"  class="form-control"> </div>
             <div class="offset-md-2 col-md-4 col-sm-12" >
               <input style="margin:5px; padding:5px;" required name="uname"  placeholder="User Name" type="text" id="uname"  class="form-control"> 
              </div>
             <div class=" col-md-4 col-sm-12" >
               <input style="margin:5px; padding:5px;" required name="pass"  placeholder="Password" type="password" class="form-control"> 
              </div>
             <div class=" offset-md-2 col-md-8" >
               <input name="btn" style="margin:5px; padding:5px; border-radius:0px;"  type="submit" value="ADD USER"  class="form-control btn btn-primary"> 
              </div>
             
            </div>
            </form> 
          </div>
           </div>

           </div>  
          <!-- Content Row -->

          <!-- Content Row -->
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
     <?php include 'footer.php';?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function username(){
      var fname = document.getElementById('fname').value;
      var lname = document.getElementById('lname').value;
      var uname =fname+lname;
      uname= uname.split(" ").join(""); 
      
      uname= uname.toLowerCase();
      
      document.getElementById('uname').value=uname;
    }
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php 
if($check){
  $fname=$_POST['fname']??"";
  $lname=$_POST['lname']??"";
  $email=$_POST['email']??"";
  $password=$_POST['pass']??"";
  $qry="INSERT INTO user_table(userId,userFname,userLname,userEmail,userName,userPassword) VALUES (null,'$fname','$lname','$email','$uname','$password');";   
  $rlt = mysqli_query($conn,$qry);
  if($rlt)
  {
    
  }
  //$_POST['psmg'] = "Hello";
    
    
}
?>