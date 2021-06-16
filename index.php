
<!DOCTYPE html>
<?php include 'sqlquries\connection.php';

?>
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
  background-image:url("userpanel/img/music.jpg");
  background-position:center;
  
  }
  
  #myimage{
  background-image:url("adminpanel/img/logo.jpg");
  background-position: center;
  height: 50px;
  }
</style>
</head>

<body style="background-color:RGBA(150,52,125,0.8)">

  <div class="container" >

    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin-top: 20px;">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5" >
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row" style="background-color:#000">
              <div class="col-lg-6 d-none d-lg-block myimage ">
                
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div id="myimage" class="mb-4  text-center align-items-center justify-content-center" style="height:160px; width:350px;border-radius:5px">
              </div>
                  <?php
                 session_start();
                 $_SESSION['uname']=null;
                 $_SESSION['userpanel']=null;
                 $_SESSION['adminpanel']=null;
                 $_SESSION['userId']=null;
                 error_reporting(0);
                $uname =$_POST['uname']??"";
                $pwd =$_POST['pass']??"";
                if(isset($_POST['btn'])){
                $query = "Select * from user_table where userName='$uname' and userPassword='$pwd';";
                $result = mysqli_query($conn,$query);
               if(($id=mysqli_fetch_array($result))>0){
                 $_SESSION['userId']=$id[0];
                 echo "<script>alert('".$_SESSION['userId']."')</script>";
                 $_SESSION['uname']=$uname;
                 $_SESSION['userpanel']="access";
                 $_SESSION['adminpanel']=null;
                 header("Location:userpanel/index.php");
                
                }else{
               $query1 = "Select * from admin_table where adminName='$uname' and adminPass='$pwd';";
              $result1 = mysqli_query($conn,$query1);
              if(mysqli_fetch_array($result1)>0){
                $_SESSION['uname']=$uname;
                $_SESSION['userpanel']=null;
                $_SESSION['adminpanel']="access";

                header("Location:adminpanel/index.php");
                //   echo "<script>location.href=adminpanel/index.php</script>";
             }else{ 
                echo "<p style='color:red;' class='text-center'>*Invalid Username Or Password</p>";
                $_SESSION['uname']=null;
                $_SESSION['userpanel']=null;
                $_SESSION['adminpanel']=null;
              }
         }
        }
?><form class="user" method="post">
                    <div class="form-group">
                      <input name="uname" type="text" class="form-control form-control-user" id="exampleInputEmail"  placeholder="Enter User Name...">
                    </div>
                    <div class="form-group">
                      <input name="pass" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    
                    <input name="btn" type="submit" class="btn btn-primary btn-user btn-block" style="height:60px;background-color:RGBA(150,52,125,0.8)" value="LOGIN">
                    
                    <hr>
                    
                  </form>
                  <br>
                  <div class="text-center">
                    <a class="large text-capitalize" style="color:#fff;" href="register.php">Create an Account!</a>
                  </div>
                  <br><br><br>
                  
                
                </div>
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

