<!DOCTYPE html>
<html lang="en">
<?php include '..\sqlquries\connection.php' ?>
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
        <?php include 'topbar.php' ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All User</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

<div class="col-md-12 col-sm-12" >
<div class="shadow p-3 mb-5 bg-white rounded" style="padding: 15px;">
<h3 class="text-center"style>View All User</h3>
<table  class=" table table-bordered table-hover text-center table-responsive-sm">
<thead> 
<tr class="btn-primary">
    <th>First Name</th>
    <th>Last Name</th>
    <th>User Name</th>
    <th>Email</th>
    <th>Password</th>
    <th colspan="2">Action Button</th>
    
  </tr>
</thead>
  <tbody>
   <?php 
   $query = "Select * from user_table";
   $result = mysqli_query($conn,$query);
   while($row=mysqli_fetch_array($result)){
     echo "<tr>
           <td>".$row[1]."</td>
           <td>".$row[2]."</td>
           <td>".$row[4]."</td>
           <td>".$row[3]."</td>
           <td>".$row[5]."</td>
           <td ><a style='padding:5px 10px;' class='btn btn-primary' href='userupdate.php?id=".$row[0]."'>Update</a></td>
           <td><a  style='padding:5px 10px;' class='btn btn-danger' href='delt.php?id=".$row[0]."&user=1'>Delete</a></td>
           </tr>";
   }
   
   ?>
  </tbody>
</table>
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
