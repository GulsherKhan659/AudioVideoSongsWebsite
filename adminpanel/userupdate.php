
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
<style>
  
</style>
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
        <?php include 'topbar.php' ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Register </h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
           <div class="row">

           <div class="offset-md-2 col-md-6 col-sm-12" >
            
           <div class="shadow p-3 mb-5 bg-white rounded" style="padding: 15px;">
           <h3 class="text-center"style>Enter User Data</h3>
           <p class="text-center">Create your account. It's free and only takes a minute.</p>
           <hr><br>
           <form method="post">
           <div class="row">
           <?php 
           $id = $_GET['id'];
           
            //$_POST['psmg'] = "Hello";
            
        
        $uquery="select * from user_table where userId = '$id'";
        $res=mysqli_query($conn,$uquery);
        $rows = mysqli_fetch_array($res);
        ?>
          
           <div class="offset-md-2 col-md-4 col-sm-12" >
           <label>FIRST NAME :</label>
            </div>
             <div class=" col-md-4 col-sm-6" >
             <input required style="color:grey; padding:0.5px" value="<?php echo $rows[1]; ?>" name="fname" id="fname" placeholder="First Name" type="text">
               
            </div>
            <div class="offset-md-2 col-md-4 col-sm-12" >
           <label>LAST NAME :</label>
            </div>
             <div class=" col-md-4 col-sm-6" >
             <input required style="color:grey; padding:0.5px" value="<?php echo $rows[2]; ?>" name="lname"   type="text" id="lname" placeholder="Last Name">
                  
            </div
            ><div class="offset-md-2 col-md-4 col-sm-6" >
           <label>EMAIL :</label>
            </div>
             <div class=" col-md-4 col-sm-6" >
             <input required style="color:grey; padding:0.5px"  value="<?php echo $rows[3]; ?>" name="email"  type="email"  placeholder="Email"  > 
            </div>
             
            <div class="offset-md-2 col-md-4 col-sm-6" >
           <label>USER NAME :</label>
            </div>
             <div class=" col-md-4 col-sm-6" >
             <input required  style="color:grey; padding:0.5px" value="<?php echo $rows[4]; ?>" name="uname"  placeholder="User Name" type="text" id="uname"> 
                
            </div>
            <div class="offset-md-2 col-md-4 col-sm-6" >
           <label>PASSWORD :</label>
            </div>
             <div class=" col-md-4 col-sm-6" >
             <input required style="color:grey; padding:0.5px" value="<?php echo $rows[5]; ?>" name="pass"  placeholder="User Name" type="text" id="uname"> 
                
            </div>
           <div class="col-md-12 col-sm-12" style="height: 50px;"></div>
           <hr>
            
              <div class=" col-sm-4 col-md-4 offset-md-2">
              
              <button name="cancel" style="margin:5px; padding:5px; border-radius:0px;border:0px"  type="submit"  class=" fa btn btn-danger float-md-left float-sm-left  "><i class="fa fa-angle-double-left fa-lg" aria-hidden="true"></i> CANCEL</button>
            
              
              </div>
              <div class=" col-sm-4 col-md-4">
              <button name="btn" style="margin:5px; padding:5px; border-radius:0px;border:0px"  type="submit"  class=" fa btn btn-primary float-md-right float-sm-left  ">UPDATE <i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i></button>
            
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

if(isset($_POST['btn'])){
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $uname=$_POST["uname"];
    $pwd=$_POST["pass"];
    

    $query="UPDATE `user_table` SET `userFname`='$fname',`userLname`='$lname',`userEmail`='$email',`userName`='$uname',`userPassword`= '$pwd' WHERE userId=$id";
    $result = mysqli_query($conn,$query);
    if($result){
     //   header("Location:userview.php");
        echo "<script>window.location.replace('userview.php');</script>";
    }

}

?>