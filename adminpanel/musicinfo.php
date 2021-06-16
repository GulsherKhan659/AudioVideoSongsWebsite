<?php include '..\sqlquries\connection.php' ?>
<?php 
if(isset($_POST['songbtn'])){
  if($_POST['check']=='audio'){
  
  $audio =  $_FILES['file']['name'];  
  $audiotmp= $_FILES['file']['tmp_name']; 
  $audio_ext=pathinfo($audio,PATHINFO_EXTENSION);
  $audio="audio_".rand(10,10000).date("mjYHis").rand(1,100000).".".$audio_ext;
  $dir ='audiosong/' ;
  $path = $dir.$audio;
  if(move_uploaded_file($audiotmp,$path)){
    
  }else{
    echo "<script>alert('NOT UPLOADED".$audio."')</script>";
  }
  $A=$audio;
}elseif($_POST['check']=='video'){
  
  $video =  $_FILES['file']['name'];  
  $videotmp= $_FILES['file']['tmp_name']; 
  $video_ext=pathinfo($video,PATHINFO_EXTENSION);
  $video="video_".rand(10,10000).date("mjYHis").rand(1,100000).".".$video_ext;
  $dir ='videosong/' ;
  $path = $dir.$video;
  if(move_uploaded_file($videotmp,$path)){
    
  }else{
    echo "<script>alert('NOT UPLOADED".$video."')</script>";
  }
  $A=$video;
}
}



if(isset($_POST['uploadbtn'])){
 $songname= $_POST['songname'];
 $artist= $_POST['artist'];
 $album= $_POST['album'];
 $year= $_POST['year'];
 $genre= $_POST['genre'];
 $language= $_POST['language'];
 
 $check = $_POST['ctrue'];
  if($check =='audio'){
    $sqlname= $_POST['songtmp'];
    
  $img=$_FILES["img"]["name"];  
  $imgtmp=$_FILES["img"]["tmp_name"];
  $img_ext=pathinfo($img,PATHINFO_EXTENSION);
  $img="img_".rand(10,10000).date("mjYHis").rand(1,100000).".".$img_ext;
  $dir ='audioimage/';
  $path = $dir.$img;
  if(move_uploaded_file($imgtmp,$path)){
     $query="INSERT INTO `audio_music`(`id`, `audio`, `image`,`name`, `artist`, `album`, `year`, `genre`, `language`) VALUES  (null,'$sqlname','$img','$songname','$artist','$album','$year','$genre','$language')";
     $result= mysqli_query($conn,$query);
     if($result){
      
       }
  }else{
    echo "<script>alert('NOT UPLOADED".$img."')</script>";
  }
  echo "<script>window.location.replace('refresh.php?val=1');</script>";
}elseif($check =='video'){
    $sqlname= $_POST['songtmp'];
    
  $img=$_FILES["img"]["name"];  
  $imgtmp=$_FILES["img"]["tmp_name"];
  $img_ext=pathinfo($img,PATHINFO_EXTENSION);
  $img="img_".rand(10,10000).date("mjYHis").rand(1,100000).".".$img_ext;
  $dir ='videoimage/' ;
  $path = $dir.$img;
  if(move_uploaded_file($imgtmp,$path)){
    $query="INSERT INTO `video_music`(`id`, `video`, `image`,`name`, `artist`, `album`, `year`, `genre`, `language`) VALUES  (null,'$sqlname','$img','$songname','$artist','$album','$year','$genre','$language')";
    $result= mysqli_query($conn,$query);
    if($result){
     
      }
  }else{
    echo "<script>alert('NOT UPLOADED".$img."')</script>";
  }
  echo "<script>window.location.replace('refresh.php?val=2');</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <script>
  function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
      document.getElementById('msg').innerHTML="*Invalid Format Please Upload Image file";
        fileInput.value = '';
        document.getElementById('submitbtn').disabled=true;
        return false;
    }else {
      document.getElementById('msg').innerHTML="";
  
    }
  }
</script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <?php// include 'sidebar.php';?>

    <!-- Content Wrpper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php


include 'topbar.php' ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <BR>
          <BR>
          <BR>
         <div class="d-sm-flex align-items-center justify-content-center mb-5">
            <h1 class="h2 mb-0 text-gray-800 align-middle align-items-center text-uppercase">Upload <?php echo $_POST['check'] ?>  Music</h1>
            
          </div>
          
          <!-- Content Row -->
          <form method="post" enctype="multipart/form-data">
         
          <div class="row">



        <!-- -->
        <div class="col-md-4 offset-4">
        <p style="color:red;" id="msg"></p>
        </div>
        <div class="col-md-2 offset-md-4 col-sm-12" >
          
          <label style="margin: 2px;">SONG IMAGE</label>
         </div>
         <div class="col-md-6 col-sm-12" >
          <input type="file" id="file" name="img"  onchange="return fileValidation()" class="form-control-file"  style="margin: 2PX;">
        </div>

        <!-- -->



         <div class="col-md-2 offset-md-4 col-sm-12" >
          <label style="margin: 2px;">SONG NAME </label>
         </div>
         <div class="col-md-6 col-sm-12" >
          <input type="TEXT" name="songname" value="<?php if(isset($_POST['songbtn']))echo $_FILES['file']['name'];  ?>"  style="margin: 2PX;">
        </div>
        <input type="hidden" name="songtmp" value="<?php if(isset($_POST['songbtn']))echo $A;  ?>"  style="margin: 2PX;">
        
        <!-- -->
        <div class="col-md-2 offset-md-4 col-sm-12" >
          <label style="margin: 2px;">ARTIST NAME </label>
         </div>
         <div class="col-md-6 col-sm-12" >
          <input type="TEXT" name='artist' style="margin: 2PX;">
        </div>

        <!-- -->
           <!-- -->
           <div class="col-md-2 offset-md-4 col-sm-12" >
          <label style="margin: 2px;">ALBUM NAME </label>
         </div>
         <div class="col-md-6 col-sm-12" >
          <input type="TEXT" name='album' value="Random" style="margin: 2PX;">
        </div>

        <!-- -->
        <!-- -->
        <div class="col-md-2 offset-md-4 col-sm-12" >
          <label style="margin: 2px;">YEAR </label>
         </div>
         <div class="col-md-6 col-sm-12" >
          <input type="TEXT" name='year' style="margin: 2PX;">
        </div>

        <!-- -->
        <!-- -->
        <div class="col-md-2 offset-md-4 col-sm-12" >
          <label style="margin: 2px;">GENRE </label>
         </div>
         <div class="col-md-6 col-sm-12" >
          <input type="TEXT" name='genre' style="margin: 2PX;">
        </div>

        <!-- -->
        <!-- -->
        <div class="col-md-2 offset-md-4 col-sm-12" >
          <label style="margin: 2px;">LANGUAGE </label>
         </div>
         <div class="col-md-6 col-sm-12" >
          <input type="TEXT" name='language' style="margin: 2PX;">
          <input type="hidden" name="ctrue" value="<?php if(isset($_POST['songbtn'])) echo $_POST['check']  ?>"  style="margin: 2PX;">
       
          <input type="submit" class="btn-primary" name="uploadbtn"  style="border:none" value="UPLOAD">
        </div>

   
        <!-- -->

                </div>

          </form>
            
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

