<?php include '..\sqlquries\connection.php' ?>


<?php include 'audio_header.php'; ?>
<div class="container text-center tm-welcome-container">
        <div class="tm-welcome">
        
        <img style="height: 250px;width:250px;border-radius:300px;" src="img\sound.png" alt="No Image found">
       
        <!--                
          <h1 class="text-uppercase mb-3 tm-site-name">Sound.com</h1> -->
          <p class="h3 tm-site-description text-uppercase" style="margin:-80px 0px 0px 0px;">Bring music to life !</p>
        </div>
      </div>

    </div>

  <!-- Loader -->
  
    <div class="container">
      <div class="tm-search-form-container" style="background-color:RGB(150,52,125)">
        <form  method="POST" class="form-inline">
  
            <div style="background-color:#cc41ff;border-radius:10px; padding:15px;"  class="text-center col-12 col-md-3 "><div style="width: 100%;height:80px;"><h3 class="text-center" style="color:#fff; padding:20px;font-weight:bolder">Audio<h3></div></div>
            <div style="background-color:transparent;" class="text-center col-12 col-md-9"  ><input name="search" class="form-inline form-control float-sm-left float-left"  type="text" style="padding:5px; width:70%; background-color:#fff;margin: 10px; "><button type="submit" name="aud-btn" style="margin-top: 10px;background-color:#cc41ff;border:none;float:left" class="btn btn-primary form-inline float-sm-left float-left" >Search</button></div>
            </form>
          </div>
       <?php
          if(isset($_POST['selectthis']) && isset($_POST['fromthis'])){
              
              $selectthis=$_POST['selectthis'];
              $fromthis=$_POST['fromthis'];
              echo "<br><div class='col-12 col-md-12'><h4 class='text-uppercase'>Audio<i class='fa fa-angle-double-right'></i>".$selectthis."<i class='fa fa-angle-double-right'></i>".$fromthis."</h4></div><br>";
              }
      ?>
      <div class="row tm-albums-container grid">

<!-- audio  -->
       
        <?php
            if(isset($_POST['selectthis']) && isset($_POST['fromthis'])){
              
              $selectthis=$_POST['selectthis'];
              $fromthis=$_POST['fromthis'];
              $query="SELECT * FROM `audio_music` WHERE `$selectthis` = '$fromthis'";
              $result=mysqli_query($conn,$query);
              if($result){
               while($data=mysqli_fetch_array($result)){
             ?>
              
        <div class="col-sm-12 col-12 col-md-6 col-lg-3 col-xl-3 tm-album-col">
          <figure class="effect-sadie" style="border-radius: 20px;">
            <img style="height: 300px;" src="..\adminpanel\audioimage\<?php echo $data[2]?>" alt="Image" class="img-fluid">
            <figcaption>
              <a href="audio_player.php?id=<?php echo $data[0]?>">
              <h2 style="color: white;" class=" text-uppercase"><?php echo $data[3]?></h2>
              
              <p style="color: white;">
        
              Artist : <?php echo $data[4]?><br>
              Album  : <?php echo $data[5]?><br>
              Year   : <?php echo $data[6]?>
             
            </p>
            </a>
            </figcaption>
          </figure>
        </div>
               
            <?php
           }
           }
          }elseif(isset($_POST['aud-btn'])||isset($_POST['index-btn'])){
              if(isset($_POST['aud-btn'])){
              $search = $_POST['search'];
              }
              if(isset($_POST['index-btn'])){
                $search = $_POST['searchindex'];
                }
              $query="SELECT * FROM `audio_music` WHERE `name` LIKE '%$search%' OR `artist` LIKE '%$search%'  OR `album` LIKE '%$search%'  OR `genre` LIKE '%$search%'";
              $result=mysqli_query($conn,$query);
              if(mysqli_num_rows($result)>0){
             
               while($data=mysqli_fetch_array($result)){
            ?>
              
        <div class="col-sm-12 col-12 col-md-6 col-lg-3 col-xl-3 tm-album-col" >
          <figure class="effect-sadie" style="border-radius: 20px;">
            <img style="height: 300px;" src="..\adminpanel\audioimage\<?php echo $data[2]?>" alt="Image" class="img-fluid">
            <figcaption >
              <a href="audio_player.php?id=<?php echo $data[0]?>">
              <h2 style="color: white;" class=" text-uppercase"><?php echo $data[3]?></h2>
              
              <p style="color: white;">
        
              Artist : <?php echo $data[4]?><br>
              Album  : <?php echo $data[5]?><br>
              Year   : <?php echo $data[6]?>
             
            </p>
            </a>
            </figcaption>
          </figure>
        </div>
               
            <?php
           }
           }else{
            echo "<div class='col-12 col-md-12 text-center' style='color:#fff ;background-color:RGB(150,52,125);padding:15px'>
          <h4>
            No Song Found Like  ".$_POST['search']."
          </h4>
            </div>";
           }
          } else{
             $query="SELECT * FROM `audio_music`";
             $result=mysqli_query($conn,$query);
             if($result){
               while($data=mysqli_fetch_array($result)){
            ?>
        <div class="col-sm-12 col-12 col-md-6 col-lg-3 col-xl-3 tm-album-col">
          <figure class="effect-sadie" style="border-radius: 20px;">
            <img style="height: 300px;" src="..\adminpanel\audioimage\<?php echo $data[2]?>" alt="Image" class="img-fluid">
            
            <figcaption>
              <a href="audio_player.php?id=<?php echo $data[0]?>">
              <h2 style="color: white;" class=" text-uppercase"><?php echo $data[3]?></h2>
              
              <p style="color: white;">
        
              Artist : <?php echo $data[4]?><br>
              Album  : <?php echo $data[5]?><br>
              Year   : <?php echo $data[6]?>
             
            </p>
            </a>
            </figcaption>
          </figure>
        </div>
               
        <?php }}} ?>
   <!-- Audio Data -->
      </div>



   
     <?php include 'footer.php' ?>
    </div> <!-- .container -->

  </div> <!-- .main -->

  <!-- load JS -->
  <script src="js/jquery-3.2.1.slim.min.js"></script> <!-- https://jquery.com/ -->
  <script>

    /* DOM is ready
    ------------------------------------------------*/
    $(function () {

      if (renderPage) {
        $('body').addClass('loaded');
      }

      $('.tm-current-year').text(new Date().getFullYear());  // Update year in copyright
    });

  </script>
</body>
</html>