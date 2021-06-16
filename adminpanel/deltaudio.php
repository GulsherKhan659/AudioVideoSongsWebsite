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
        <?php include 'topbar.php' ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Delete Audio Music</h1>
         <form method="post" class="d-none d-sm-inline-block ">
           <input name="search" type="text" placeholder="Search Song Name"><button type="submit" name="sbtn"><i class="fa fa-search"></i></button>
         </form>
          </div>

          <!-- Content Row -->

<!-- Content Row -->
<div class="row">
          
            <?php
            if(isset($_POST['sbtn'])){
              $search=$_POST['search'];
            }else{
              $search="";
            }
             $query="SELECT * FROM `audio_music` WHERE `name` LIKE '%$search%'";
             $result=mysqli_query($conn,$query);
             if($result){
              
               while($data=mysqli_fetch_array($result)){
            ?>
            <div class="col-md-3 col-12">
            
              <div class="card shadow p-3 mb-5 bg-white rounded">
              <div class="float-right">
              <a href="delt.php?id=<?php echo $data[0]?>&user=2">
             <i class="fa fa-trash  " style="font-size:20px;color:RED;margin:-10px 0px 10px 0px; float:right" aria-hidden="true">
            
             </i>
             </a>
              </div>
               
              <img style="height: 250px;" class="card-img-top"  src="audioimage\<?php echo $data[2]?>" alt="No Image Found"  >    
            
   
   <div class="row">
   <div class="col-md-12 col-12">
     <div style="font-size: 12px; padding:5px" class="text-uppercaseSS"> Rating 5/5
       <i class="fa fa-star" style="color:#FDCC0D" aria-hidden="true"></i>
       <i class="fa fa-star" style="color:#FDCC0D" aria-hidden="true"></i>
       <i class="fa fa-star" style="color:#FDCC0D" aria-hidden="true"></i>
       <i class="fa fa-star" style="color:#FDCC0D" aria-hidden="true"></i>
       <i class="fa fa-star" style="color:#FDCC0D" aria-hidden="true"></i>
     </div> 
      </div>
    <div class="col-md-4 col-4"style="font-stech:condensed">
   <span style="font-size: 13px;font-weight:bold;">Song Name</span> 
   </div>
   <div class="col-md-8 col-8">
   <span style="font-size: 13px;font-weight:bold;"><?php echo $data[3]?></span>   
   </div>
   
   
   <div class="col-md-12 col-12">
     
   <audio id="aud"  controls style="width:100%;">
     <source src="audiosong\<?php echo $data[1]?>" type="audio/mpeg">
     </audio>
</div>
   
           </div>
              </div>
            
            </div>
            <?php 
             }
            }else{
              echo "<div class='col-12 col-md-12'style='height:200px';><h4 class='text-center' >No Song Uploaded Yet</h4></div>";
            }
            ?>
          
         <!-- /Content Row -->
          
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
