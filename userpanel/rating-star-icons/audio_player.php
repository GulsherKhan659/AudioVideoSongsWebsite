
<?php include '..\sqlquries\connection.php' ?>
<?php
session_start();

if ($_SESSION['userpanel']=="access" && !isset($_SESSION['adminpanel'])){
//echo "<script>alert('Session ".$adm."')</script>";
 
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <title>Sound.com</title>

<!--

Template 2101 Insertion
-------------------------------------------------------------------------------------------
http://www.tooplate.com/view/2101-insertion

-->
  <!-- load CSS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">        <!-- Google web font "Open Sans" -->
                               <!-- Templatemo style -->
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

  
  
</head>

<body  style="background-color: #000;">

<div class="tm-main">

    <div class="tm-welcome-section">



      <div class="container-fluid tm-navbar-container">
      
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
        <a class="nav-link " href="#" >Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle design" href="#" id="navbardrop" data-toggle="dropdown">
      Audio Song
      </a>
      <div class="dropdown-menu " style="background-color:RGB(150,52,125);">
        
        <a class="dropdown-item design" href="#">Video Song</a>
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
  <ul class="navbar-nav design" style="text-decoration: none; float:right;margin-right:50px">
      
     <li class="nav-item dropdown no-arrow" style="text-decoration: none; float:right">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small text-uppercase"><?php echo $_SESSION['uname']." "; ?></span>
                <img class="img-profile rounded-circle" style="width:30px;height:30px" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
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
  
  
</nav>
          </div>
        </div>
 
<?php 
}else{
  echo "<script>window.location.replace('../index.php');</script>";
}
?>



<div class="row" >
<div class="col-12 col-md-8 offset-md-2">
<div class="card" style="top:15vh;background-color:RGB(150,52,125);color:#fff;">
<div class="row">
<div class="col-12 col-md-4">
<img src="Poster3.jpg" style="width: 100%; height:30vw; border-radius:5px">
</div>
<div class="col-12 col-md-8 "  style=" padding: 5vh;" >
<p>
  Rating 4.5/5 
       <i class="fa fa-star" id="r1" onclick="star()" style="color:#FDCC0D" aria-hidden="true"></i>
       <i class="fa fa-star" id="r2" onclick="star()" style="color:#FDCC0D" aria-hidden="true"></i>
       <i class="fa fa-star" id="r3" onclick="star()" style="color:#FDCC0D" aria-hidden="true"></i>
       <i class="fa fa-star" id="r4" style="color:#FDCC0D" aria-hidden="true"></i>
       <i class="fa fa-star" id="r5" style="color:#FDCC0D" aria-hidden="true"></i>
</p>
<h1>Song</h1>
<p class="h5" style="padding: 15px;">
  Artist:<br>
  Album:<br>
  Year:<br>
  Genre:<br>
  Language:
  
</p>
<br>
<Audio controls style="width: 100%;">
  <source>
</Audio>

</div>

</div>

</div><!--   card -->
 </div>
</div>

                 
</div>
<?php
$audioid=$_GET['id'];
$userId=$_SESSION['userId'];
$squery="Select * from audiorr WHERE userId = $userId and audioId= $audioid";
$sresult=mysqli_query($conn,$squery);
if(!mysqli_fetch_array($sresult)>0){
  
?>
<div class="col-12 col-md-10 offset-md-2" style="color: #fff;top:8vw">
               <form method="post">
               <label for="starsInput">Rate & Review This Song</label>
                <div id="review"></div>
                <input type="hidden" name="rating" readonly id="starsInput" class="form-control form-control-sm">
                <textarea name="review" style="width: 60vw;height:250px" placeholder="Write A Review Here"></textarea><input type="submit" class="btn  " name="btn-review" value="Review" style="margin-bottom:30px;color:white;background-color:RGB(150,52,125)">
               </form>
</div>
<?php
} 
?>
<div class="col-12 col-md-8 offset-md-2" style="color: #fff;top:8vw">
<div class="card" style="background-color:RGB(150,52,125);">
<?php
// while($data=mysqli_fetch_array($sresult)){
?>
<div class="row">
<?php
    $q="SELECT user_table.userFname,user_table.userLname,audiorr.rating ,audiorr.review  FROM audiorr INNER JOIN user_table ON user_table.userId=audiorr.userId";
    $r=mysqli_query($conn,$q);
    while($data=mysqli_fetch_array($r)){
  ?>
<div class="col-4 col-md-2" style="padding: 10px;">
  <div class="float-right"  style=" width: 100px;height:100px;border-radius:100px;background-color:white"></div>
  </div>
  <div class="col-8 col-md-9" style="padding: 20px;">
  <p class="text-uppercase">
    <?php echo $data[0]."".$data[1]?>
  </p>
  <p>
  Rated Song : 
 <?php
 $i=1;
 $j=1;
 $rated=$data[2];
 while($i<=5){
 if($j<=$rated){
 ?>
 
 <i class="fa fa-star" style="color:#FDCC0D" aria-hidden="true"></i>
  <?php
$j++; 
}else{
  ?>
  <i class="fa fa-star"   aria-hidden="true"></i>
  <?php
 
 }
 $i++;
}
  
 echo "</p><p>$data[3]</p></div>";

}
?>
</div>
</div>
</div>
</div>
    </div>
</div>


 <script src="rating-star-icons\dist\rating.js"></script>
  
  <script>
     $("#review").rating({
        "value": 2,
        "click": function (e) {
            console.log(e);
            $("#starsInput").val(e.stars);
        }
     });
    /* DOM is ready
    ------------------------------------------------*/
  

  </script>
</body>
</html>
<?php 

if(isset($_POST['btn-review'])){
  $rating=$_POST['rating'];
  $review=$_POST['review'];

  $query = "INSERT INTO audiorr(audiorrId,rating,review,audioId,userId) VALUES (null,$rating,'$review',$audioid,$userId);";
  $result=mysqli_query($conn,$query);
  if($result){
    echo "<script>location.replace('refresh.php?id=".$audioid."');</script>";
  }

}

?>