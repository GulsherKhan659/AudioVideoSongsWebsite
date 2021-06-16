<!DOCTYPE html>
<?php include 'sqlquries\connection.php';?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sound.com</title>


  <!-- Custom fonts for this template-->
  <link href="adminpanel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="adminpanel/css/sb-admin-2.min.css" rel="stylesheet">
<style>
  .myimage{
  background-image:url("adminpanel/img/register.jpg");
  background-position: center;
  
  }
  #myimage{
  background-image:url("adminpanel/img/logo.jpg");
  background-position: center;
  
  }
</style>
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
</head>

<body style="background-color:RGBA(150,52,125,0.8)">
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row" style="background-color: #000;">
          <div class="col-lg-5 d-none d-lg-block myimage"></div>
          <div class="col-lg-7">
          <div class="p-5 justify-content-center">
                  <div id="myimage" class="mb-4  text-center align-items-center justify-content-center" style="height:150px; width:100%;border-radius:5px">
                <h1 class="h3 text-uppercase mb-4" style="color:#fff">Create an Account!</h1>
                </div>
                <div class="p-5">
              <div class="text-center">   
                <?php 
           $check=false;
           $pwd=$_POST['pass']??"";
           $rpwd=$_POST['rpass']??"";
           if($pwd == $rpwd){
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
            
        }
        }else {
          echo "<div class='offset-md-2 col-md-8 col-sm-12' >
          <p class='text-center' style='color:red'>*Password is not match.</p>
           </div>";
        }
        ?>
              </div>
              <form class="user" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input onchange="username()" type="text" class="form-control form-control-user" id="fname" placeholder="First Name" name="fname">
                  </div>
                  <div class="col-sm-6">
                    <input onchange="username()" type="text" class="form-control form-control-user" id="lname" placeholder="Last Name" name="lname">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Email" name="email">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="uname" placeholder="User Name" name="uname">
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="pass">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="rpass">
                  </div>
                </div>
               <button  class="btn btn-primary btn-user btn-block" name="btn" style="height:60px;background-color:RGBA(150,52,125,0.8)"  type="submit" >Register Account</button>
    
              </form>
              <br>
              <div class="text-center">
                <a class="larage text-capitalize" style="color:#fff;" href="index.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  
<!-- Bootstrap core JavaScript-->
  <script src="adminpanel/vendor/jquery/jquery.min.js"></script>
  <script src="adminpanel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="adminpanel/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="adminpanel/js/sb-admin-2.min.js"></script>

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
    echo "<script>window.location.replace('index.php');</script>";
  }
  //$_POST['psmg'] = "Hello";
    
    
}
?>


<!-- $$$$$$$$ -->


