<?php
session_start();

if ($_SESSION['userpanel']=="access" && !isset($_SESSION['adminpanel'])){
//echo "<script>alert('Session ".$adm."')</script>";
 
?>

<?php include '..\sqlquries\connection.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sound.com</title>

<!--

Template 2101 Insertion

http://www.tooplate.com/view/2101-insertion

-->
  <!-- load CSS -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">        <!-- Google web font "Open Sans" -->
  <link rel="stylesheet" href="css/bootstrap.min.css">                                            <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/fontawesome-all.min.css">                                      <!-- Font awesome -->
  <link rel="stylesheet" href="css/tooplate-style.css">                                           <!-- Templatemo style -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .design a{
    font-size: 15px;
    color: white;
    padding: 10px 10px 10px 10px;
    text-decoration: none;  
  }
  .design a:link{
    color: white;
  }
  .design a:hover {

    background-color:RGBA(150,52,125,5);
    border-radius: 5px;
  }
  
  </style>

  
  <script>
    var renderPage = true;

    if (navigator.userAgent.indexOf('MSIE') !== -1
      || navigator.appVersion.indexOf('Trident/') > 0) {
      /* Microsoft Internet Explorer detected in. */
      alert("Please view this in a modern browser such as Chrome or Microsoft Edge.");
      renderPage = false;
    }
  </script>
  
</head>

<body style="background-color: #000;color:#fff">


<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>

  <div class="tm-main">

    <div id="myDiv" class="tm-welcome-section">
        
      <div class="container tm-navbar-container">
      
        <div class="row">
          <div class="col-md-12 col-12">
        
<nav style=" background-color:RGBA(150,52,125,0.6); color:white;" class="text-uppercase  navbar fixed-top navbar-expand-lg "><br>
<br>
<a class="navbar-brand" style="margin-top: 5px;color:white;" href="#">
    <img src="img\sound.png" width="35" height="35" class="d-inline-block align-top" alt="">
    <h4 style="font-weight: bolder;" class="d-inline-block align-top">Sound.com</h4>    
  </a>
  <button style="border:none;"  class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <i style="color:white;" class="fa fa-caret-down fa-1x" aria-hidden="true"></i>
  </button>
  
  
  <div class="collapse navbar-collapse " style="margin-right:50px;" id="navbarNav">
  <ul class="navbar-nav design">
      <li class="nav-item ">
        <a class="nav-link " href="index.php" >Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle design" href="audio_index.php" id="navbardrop" data-toggle="dropdown">
      Audio Song
      </a>
      <div class="dropdown-menu " style="background-color:RGB(150,52,125);">
        
        <a class="dropdown-item design" href="video_index.php">Video Song</a>
      </div>
    </li>
     <?php
     $query="SHOW COLUMNS FROM audio_music";
     $result=mysqli_query($conn,$query);
     while($navname=mysqli_fetch_array($result)){
    if($navname[0]=='id'|| $navname[0]=='audio' || $navname[0]=='image'|| $navname[0]=='name'){
    }else{
    ?>
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle design" href="#" id="navbardrop" data-toggle="dropdown">
       <?php echo $navname[0];?>
      </a>
      <div class="dropdown-menu " style="background-color:RGB(150,52,125);">
      <?php
      $query1="SELECT $navname[0] FROM audio_music GROUP BY $navname[0] HAVING COUNT($navname[0]) >1";
      $result1=mysqli_query($conn,$query1);
      while($navname1=mysqli_fetch_array($result1)){
     ?>
     <form method="POST" action="audio_index.php">
       <input type="hidden" name="selectthis" value="<?php echo $navname[0];?>">
        <input  class="dropdown-item design text-uppercase" type="submit" name="fromthis" value="<?php echo $navname1[0];?>">
      </form>
      <?php 
     
    }?>
      
      </div>
    </li>
    <?php 
      }
     }
    ?>
     
    </ul>
    
  </div>
  <?php include 'logout.php' ?>
  
</nav>
          </div>
        </div>
      </div>

      
<?php 
}else{
  echo "<script>window.location.replace('../index.php');</script>";
}
?>
